<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
class TransactionController extends Controller
{
    public function index()
    {        
        $user_accounts = Auth::user()->accounts;
        $accounts = $user_accounts->pluck('id')->toArray();
        $transactions = Transaction::whereIn('account_id',$accounts)->orWhereIn('destionation_account_id',$accounts)->get()->load(['senderAccount','receiverAccount']);
        return Inertia::render('Transactions',['transactions'=>$transactions,
                                                                    'accounts' => $user_accounts
                                                                ]);
    }
    public function getRecentTransactions()
    {
        // Get the authenticated user's accounts
        $userAccounts = auth()->user()->accounts()->pluck('id');

        // Fetch the last 4 transactions (both sent and received)
        $transactions = Transaction::with(['senderAccount.user', 'receiverAccount.user'])
            ->where(function ($query) use ($userAccounts) {
                $query->whereIn('account_id', $userAccounts) // Transactions sent by the user
                    ->orWhereIn('destionation_account_id', $userAccounts); // Transactions received by the user
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get()
            ->map(function ($transaction) use ($userAccounts) {
                // Determine if the user is the sender or receiver
                $isSent = $userAccounts->contains($transaction->account_id);

                // Add the other party's name
                $transaction->other_party_name = $isSent
                    ? $transaction->receiverAccount->user->first_name . ' '.$transaction->receiverAccount->user->last_name // Receiver name
                    : $transaction->senderAccount->user->first_name . ' '. $transaction->senderAccount->user->last_name; // Sender name

                // Add the transaction type dynamically
                $transaction->type = $isSent ? 'debit' : 'credit';
                $transaction->date = $transaction->created_at->toIso8601String();
                return $transaction;
            });

        return response()->json($transactions);
    }
    public function add(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('The password is incorrect.');
                }
            }],
            'destination' => ['required', 'numeric', function ($attribute, $value, $fail) {
                if (!Account::where('number', $value)->exists()) {
                    $fail('The destination account does not exist.');
                }
            }],
            'account' => ['required', 'numeric', function ($attribute, $value, $fail) {
                if (!Auth::user()->accounts()->where('number', $value)->exists()) {
                    $fail('The account does not belong to the authenticated user.');
                }
            }],
            'amount' => 'required|numeric',
        ]);
        $transaction = Transaction::create([
            'account_id' => Auth::user()->accounts()->where('number',$request->account)->first()->id,
            'destionation_account_id' => Account::where('number', $request->destination)->first()->id,
            'amount' => $request->amount,
            'description' => 'no description'
        ]);
        $transaction->load(['senderAccount','receiverAccount']);
        return response()->json($transaction);

    }
}
