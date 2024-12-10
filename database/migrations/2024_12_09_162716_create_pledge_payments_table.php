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
            $table->string('student_name');
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('phone');
            $table->integer('donation_percent');
            $table->decimal('amount', 10, 2);
            $table->string('donation_for');
            $table->boolean('pledge_approved')->default(1); // Default value 0 (pending approval)
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
