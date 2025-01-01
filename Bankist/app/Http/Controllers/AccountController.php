<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {

    }   
    public function saving()
    {
        return Inertia::render('Saving');
    }
    public function checking()
    {
        return Inertia::render('Checking');
    }
    public function loan()
    {
        return Inertia::render('Loan');
        
    }
}
