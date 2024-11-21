<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function index()
    {



        
        $accounts = Auth::user()->accounts->pluck('id')->toArray();
        $transactions = Transaction::whereIn('account_id',$accounts)->orWhereIn('destionation_account_id',$accounts)->get()->load(['source','destination']);
        return Inertia::render('Transactions', ['transactions'=>$transactions, 'account'=>$accounts]);
    }
}
