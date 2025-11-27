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
        Schema::create('default_package_fouryear_degree', function (Blueprint $table) {
            $table->id();

            $table->string('hostelandmessing')->nullable();
            $table->string('program_type')->nullable();
            $table->string('degree')->nullable();
            $table->integer('seats')->nullable();
            $table->decimal('totalAmount', 15, 2)->nullable();

            $table->string('donor_name')->nullable();
            $table->string('donor_email')->nullable();
            $table->string('phone')->nullable();

            $table->longText('about_partner')->nullable();
            $table->longText('philanthropist_text')->nullable();

            $table->string('school')->nullable();
            $table->string('country')->nullable();
            $table->string('year')->nullable();

            $table->string('payments_status')->default('pending'); // paid/pending
            $table->string('prove')->nullable(); // file path

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_package_fouryear_degree');
    }
};
