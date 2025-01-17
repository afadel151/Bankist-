<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Auth::user()->loans;
        return Inertia::render('Loans', [
            'loans' => $loans
        ]);
    }
    public function request(Request $request)
    {
        Loan::create([
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'nb_months' => $request->nb_months,
            'start_date' => Carbon::today(),
            'status' => 'waiting',
            'loan_type' => $request->type,
        ]);
        return $this->index();
        // return redirect()->route('loans.index');

    }
}
