<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use PDF;
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
    public function downloadPDF()
    {
        // Exemple de données de transaction
        

        $accounts = User::find(Auth::user()->id)->accounts->pluck('id')->toArray();
        $empty = false;
        $transactions = Transaction::whereIn('account_id',$accounts)->orWhereIn('destionation_account_id',$accounts)->get()->load(['senderAccount','receiverAccount']);
        
       
        if ($transactions->isNotEmpty()) {
            
            $transactions->map(function ($transaction) use($accounts){
                    if (in_array($transaction->account_id,$accounts)) {
                        $transaction->type = 'Sent';
                        $destination = User::find(Account::find($transaction->destionation_account_id)->user_id);
                        $transaction->other_name = $destination->first_name . $destination->last_name;
                        $transaction->other_account_number = Account::find($transaction->destionation_account_id)->number;
                        $transaction->date = $transaction->created_at->toDateString();
                    }else{
                        $transaction->type = 'Received';
                    $destination = User::find(Account::find($transaction->account_id)->user_id);
                    $transaction->other_name = $destination->first_name . $destination->last_name;
                    $transaction->other_account_number = Account::find($transaction->account_id)->number;
                    $transaction->date = $transaction->created_at->toDateString();
                }
            });
            $pdf = PDF::loadView('transactions.form', compact(['transactions','empty']));
            return $pdf->download('formulaire_transactions.pdf');
        }   
        else {

            $empty = true;
            $pdf = PDF::loadView('transactions.form', compact(['transactions','empty']));
            return $pdf->download('formulaire_transactions.pdf');

        }
        // return $pdf->download('formulaire_transactions.pdf');
        // return redirect()->route('transactions.index');
    }
    public function getRecentTransactions(Request $request)
    {
        // Get the authenticated user's accounts
        $userAccounts = auth()->user()->accounts()->pluck('id');
        if ($request->account_id) {
            $userAccounts = [$request->account_id];
        }
        $transactions = Transaction::with(['senderAccount.user', 'receiverAccount.user'])
            ->where(function ($query) use ($userAccounts) {
                $query->whereIn('account_id', $userAccounts) // Transactions sent by the user
                    ->orWhereIn('destionation_account_id', $userAccounts); // Transactions received by the user
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get()
            ->map(function ($transaction) use ($userAccounts) {
                $isSent = $userAccounts->contains($transaction->account_id);

                $transaction->other_party_name = $isSent
                    ? $transaction->receiverAccount->user->first_name . ' '.$transaction->receiverAccount->user->last_name // Receiver name
                    : $transaction->senderAccount->user->first_name . ' '. $transaction->senderAccount->user->last_name; // Sender name

                $transaction->type = $isSent ? 'debit' : 'credit';
                $transaction->date = $transaction->created_at->toIso8601String();
                return $transaction;
            });

        return response()->json($transactions);
    }
    public function add(Request $request)
    {
        $request->validate([
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
            'amount' => ['required','numeric',
                function ($attribute, $value, $fail) use ($request) {
                    $account = Auth::user()->accounts()->where('number', $request->account)->first();
                    if (!$account) {
                        $fail('The account does not belong to the authenticated user.');
                        return;
                    }
                    if ($account->balance < $value) {
                        $fail('You don\'t have enough money in your account.');
                    }
                },
            ],
        ]);
        if (!Account::where('number',$request->account)->exists()) {
            return response(status : 202);
        }
        if ($request->amount < Account::where('number', $request->account)->first()->balance) {
            DB::beginTransaction();
        
            try {
                $transaction = Transaction::create([
                    'account_id' => Auth::user()->accounts()->where('number', $request->account)->first()->id,
                    'destionation_account_id' => Account::where('number', $request->destination)->first()->id,
                    'amount' => $request->amount,
                    'description' => 'no description'
                ]);
        
                $acc = Account::where('number', $request->account)->first();
                $acc->update([
                    'balance' => $acc->balance - $request->amount
                ]);
        
                $dest = Account::where('number', $request->destination)->first();
                $dest->update([
                    'balance' => $dest->balance + $request->amount
                ]);
        
                $transaction->load(['senderAccount', 'receiverAccount']);
                DB::commit();
        
                return response(status : 200)->json($transaction);
            } catch (\Exception $e) {
                DB::rollBack();
                return response(status : 201)->json(['error' => $e->getMessage()]);
            }
        } else {
            return response(status : 203);
        }

    }
}
