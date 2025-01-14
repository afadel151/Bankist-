<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function generateUniqueAccountNumber($existingAccountNumbers = []) {
        $length = 10; 
    
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number'=>'required|numeric',
            'birth_date' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'salary' => 'required'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'postal_code' => $request->postal_code,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'salary' => $request->salary
        ]);
        $account = Account::create([
            'user_id' => $user->id,
            'number' => $this->generateUniqueAccountNumber(Account::pluck('number')->toArray()),
            'account_type' => 'checking',
            'balance' => 0.00,
            'currency' => 'USD',
        ]);
        Card::create([
            'user_id' => $user->id,
            'card_number' => $this->generateUniqueVisaCardNumber(),
            'card_type' => 'visa',
            'credit_limit' => 100000,
            'account_id' => $account->id,
            'expiry_date' => $this->getSameDayNextYear(),
            'ccv' => $this->generateCcv(),
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
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
