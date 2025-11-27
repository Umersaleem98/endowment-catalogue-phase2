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
        Schema::create('pledge_payments', function (Blueprint $table) {
            $table->id();
             $table->string('student_name')->nullable();
            $table->string('donor_name')->nullable();
            $table->string('donor_email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('donation_percent')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('donation_for')->nullable();
            $table->string('pledge_approved')->default('pending'); // pending / approved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pledge_payments');
    }
};
