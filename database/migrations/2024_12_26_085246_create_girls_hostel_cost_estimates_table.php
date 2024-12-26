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
        Schema::create('girls_hostel_cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->string('description'); // e.g., BOYS HOSTEL (10 FLOORS)
            $table->decimal('area_sft', 15, 2); // e.g., 150,435.00
            $table->integer('quantity'); // e.g., 1
            $table->decimal('total_area_sft', 15, 2); // e.g., 150,435.00
            $table->decimal('construction_cost', 20, 2); // e.g., 1,579,567,500.00
            $table->decimal('total_project_cost', 20, 2); // e.g., 1,579,567,500.00
            $table->decimal('total_in_million', 15, 2); // e.g., 1,579.57
            $table->string('project_name'); // Name of the project
            $table->string('donor_name'); // Donor's name
            $table->string('donor_email'); // Donor's email
            $table->string('donor_phone'); // Donor's phone number
            $table->string('prove')->nullable(); // Donor's phone number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('girls_hostel_cost_estimates');
    }
};
