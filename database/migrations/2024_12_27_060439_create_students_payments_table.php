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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('student_name'); // Name of the student
            $table->string('donor_name');  // Donor's name
            $table->string('donor_email'); // Donor's email
            $table->string('phone')->nullable(); // Phone number of the donor
            $table->decimal('duration', 8, 2); // Duration amount in PKR
            $table->decimal('duration_sum', 8, 2); // Duration amount in PKR
            $table->decimal('messing', 8, 2)->nullable(); // Messing amount in PKR
            $table->decimal('amount', 8, 2); // Total calculated amount in PKR
            $table->string('prove')->nullable();         // Proof of payment (file upload)
            $table->boolean('payment_approved')->default(0); // Payment approval status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
