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
        Schema::create('business_center', function (Blueprint $table) {
            $table->id();
            $table->string('description'); // Description of the item
            $table->decimal('area_sft', 15, 2); // Area in square feet
            $table->integer('quantity'); // Quantity
            $table->decimal('total_area_sft', 15, 2); // Total area in square feet
            $table->decimal('construction_cost', 20, 2); // Construction cost
            $table->decimal('total_project_cost', 20, 2); // Total project cost
            $table->decimal('total_in_million', 15, 2); // Total cost in millions
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
        Schema::dropIfExists('business_center');
    }
};
