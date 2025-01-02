<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'loan_type',
        'amount',
        'start_date',
        'status',
        'nb_months'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
