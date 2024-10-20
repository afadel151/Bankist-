<?php

namespace App\Models;

use Blade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_number',
        'card_type',
        'credit_limit',
        'balance',
        'expiry_date',
        'ccv'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
