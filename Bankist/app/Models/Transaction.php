<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'amount',
        'destionation_account_id',
        'description'
    ];
    
    public function senderAccount()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function receiverAccount()
    {
        return $this->belongsTo(Account::class, 'destionation_account_id');
    }
}
