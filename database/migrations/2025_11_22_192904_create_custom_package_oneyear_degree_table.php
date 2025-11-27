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
        Schema::create('custom_package_oneyear_degree', function (Blueprint $table) {
            $table->id();
            $table->string('program_type');
            $table->string('degree');
            $table->integer('seats');
            $table->decimal('totalAmount', 15, 2);
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('phone');
            $table->text('about_partner')->nullable();
            $table->text('philanthropist_text')->nullable();
            $table->string('school')->nullable();
            $table->string('country')->nullable();
            $table->year('year')->nullable();
            $table->boolean('payments_status')->default(false);
            $table->string('prove')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_package_oneyear_degree');
    }
};
