<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function generateUniqueAccountNumber() {
        $length = 10; 
        $existingAccountNumbers = Account::pluck('number')->toArray();
        do {
            $accountNumber = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        } while (in_array($accountNumber, $existingAccountNumbers));
    
        return $accountNumber;
    }
    public function  generateUniqueVisaCardNumber()
    {
        do {
            $cardNumber = '4' . Str::random(15);
            $cardNumber = preg_replace('/[^0-9]/', '0', $cardNumber);
            $exists = Card::where('card_number', $cardNumber)->exists();
        } while ($exists);
        return $cardNumber;
    }

    public function index()
    {

    }   
    public function saving()
    {
        $account = Auth::user()->accounts->where('account_type','savings')->first();
        if ($account) {
            $account->load('card');
            $account->card->load(['account','user']);
        }
        
        return Inertia::render('Saving',[
            'account' => $account
        ]);
    }
    public function create_account(Request $request)
    {
        $type = $request->type;
        $account = Account::create([
            'account_type' => $type,
            'number' => $this->generateUniqueAccountNumber(),
            'user_id' => auth()->user()->id,
            'balance' => 0.00,
            'currency' => 'USD',
        ]);
        Card::create([
            'card_number' => $this->generateUniqueVisaCardNumber(),
            'user_id' => auth()->user()->id,
            'account_id' => $account->id,
            'ccv' => $this->generateCcv(),
            'expiry_date' => $this->getSameDayNextYear(),
            'card_type' => 'visa',
            'credit_limit' => 100000
        ]);
        return redirect()->route('accounts.'.$type);
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
    private function getSameDayNextYear()
    {
        return Carbon::now()->addYear()->toDateString();
    }
    private function generateCcv()
    {
        return str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
    }
}
