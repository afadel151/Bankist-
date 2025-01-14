<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('u_users');
            $table->string('card_number',16)->unique();
            $table->enum('card_type',['visa','mastercard','amex']);
            $table->decimal('credit_limit',18,2);
            $table->foreignId('account_id')->constrained('accounts');
            $table->date('expiry_date');
            $table->string('ccv',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
