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
        Schema::create('fund_a_project_payments', function (Blueprint $table) {
            $table->id();
            $table->string('project_name'); // Name of the project
            $table->string('donor_name'); // Name of the donor
            $table->string('donor_email'); // Donor's email
            $table->string('phone'); // Phone number of the donor
            $table->string('amount_for'); // Amount allocated for rooms
            $table->decimal('amount', 10, 2); // Total amount in PKR
            $table->string('prove'); // Name of the project
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_a_project_payments');
    }
};
