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
        Schema::create('hostel_payments', function (Blueprint $table) {
            $table->id();
             $table->string('student_name');
            $table->string('donor_name');
            $table->string('donor_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_type')->nullable();
            $table->string('payment_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostel_payments');
    }
};
