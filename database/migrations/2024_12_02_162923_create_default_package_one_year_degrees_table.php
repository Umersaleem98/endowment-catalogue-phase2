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
        Schema::create('default_package_one_year_degrees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('program_type'); // Program type (e.g., one_year_UG)
            $table->string('degree'); // Degree type (e.g., Engineering)
            $table->integer('seats'); // Number of seats
            $table->decimal('totalAmount', 10, 2); // Total amount
            $table->string('donor_name'); // Donor's name
            $table->string('donor_email'); // Donor's email
            $table->string('phone'); // Phone number
            $table->string('about_partner')->nullable(); // Information about the partner
            $table->text('philanthropist_text')->nullable(); // Philanthropist text
            $table->string('country'); // Country
            $table->year('year'); // Year
            $table->string('payments_status'); // Payment status (e.g., Paynow)
            $table->string('prove')->nullable(); // File path for proof
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_package_one_year_degrees');
    }
};
