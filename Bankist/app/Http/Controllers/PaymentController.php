<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index()
    {
        $cards = Auth::user()->cards;
        $payments = [];
        foreach ($cards as $card) {
            $payments = array_merge($payments, $card->payments);
        }
        
        return Inertia::render('Payments');
    }
}
