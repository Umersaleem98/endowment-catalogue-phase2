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
            $table->string('student_name');
            $table->string('donor_name');
            $table->string('donor_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('duration')->nullable();
            $table->integer('duration_sum')->nullable();
            $table->string('messing')->nullable();
            $table->decimal('amount', 12, 2)->default(0); // Adjust precision as needed
            $table->string('prove')->nullable();
            $table->string('payment_approved')->nullable();
            $table->timestamps(); // created_at & updated_at
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
