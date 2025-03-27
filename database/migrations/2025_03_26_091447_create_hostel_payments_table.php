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
            $table->string('donor_email');
            $table->string('phone');
            $table->integer('duration');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_type', ['payment', 'pledge']);
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
