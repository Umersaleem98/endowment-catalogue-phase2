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
        Schema::create('endowment_zakat_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type'); // e.g., 'paynow'
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('phone');
            $table->string('duration'); // e.g., 'one_year', 'entire_degree'
            $table->decimal('amount', 10, 2); // Adjust size/precision as needed
            $table->string('prove')->nullable(); // Optional file or evidence
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endowment_zakat_payments');
    }
};
