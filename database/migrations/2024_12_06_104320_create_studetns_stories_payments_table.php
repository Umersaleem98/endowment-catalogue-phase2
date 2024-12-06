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
        Schema::create('studetns_stories_payments', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->nullable(); // Student's name
            $table->string('donor_name')->nullable();   // Donor's name
            $table->string('donor_email')->nullable();  // Donor's email
            $table->string('phone')->nullable();        // Phone number
            $table->decimal('amount', 10, 2)->nullable(); // Amount in PKR
            $table->integer('donation_percent')->nullable(); // Donation percentage
            $table->decimal('donation_amount', 10, 2)->nullable(); // Calculated donation amount
            $table->string('donation_for')->nullable();  // Purpose of donation (e.g., tuition fee, accommodation, etc.)
            $table->string('duration')->nullable();      // Duration (e.g., 6 months, 1 year, etc.)
            $table->string('prove')->nullable();         // Proof of payment (file upload)
            $table->boolean('payment_approved')->default(0); // Payment approval status
            $table->timestamps(); // Created at and Updated at
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studetns_stories_payments');
    }
};
