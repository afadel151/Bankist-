<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user_id',
        'account_type',
        'balance',
        'currency',

    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
