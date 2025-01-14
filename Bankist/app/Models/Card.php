<?php

namespace App\Models;

use Blade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'ccv',
        'account_id',
        'locked'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function payments(): HasMany {
        return $this->hasMany(Payment::class);
    }
    public function account():BelongsTo{
        return $this->belongsTo(Account::class);
    }
}
