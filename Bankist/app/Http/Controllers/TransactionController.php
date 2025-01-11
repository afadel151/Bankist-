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
        $transactions = Transaction::whereIn('account_id',$accounts)->orWhereIn('destionation_account_id',$accounts)->get()->load(['source','destination']);
        return Inertia::render('Transactions',['transactions'=>$transactions,
                                                                    'accounts' => $user_accounts
                                                                ]);
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
        $transaction->load(['source','destination']);
        return response()->json($transaction);

    }
}
