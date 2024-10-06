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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('loan_type',['home','car','personal','business']);
            $table->decimal('loan_amount',18,2);
            $table->decimal('interest_rate',5,2);
            $table->integer('loan_term_years');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('monthly_payment',18,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
