<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {

    }   
    public function saving()
    {
        $account = Auth::user()->accounts->where('account_type','savings')->first();
        $account->load('card');
        $account->card->load(['account','user']);
        return Inertia::render('Saving',[
            'account' => $account
        ]);
    }
    public function create_account(Request $request)
    {

    }
    public function checking()
    {
        $account = Auth::user()->accounts->where('account_type','checking')->first();
        $account->load('card');
        $account->card->load(['account','user']);
        return Inertia::render('Checking',[
            'account' => $account
        ]);
    }
    public function loan()
    {
        return Inertia::render('Loan');
        
    }
}
