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

             $table->string('description');
            $table->decimal('area_sft', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('total_area_sft', 10, 2)->nullable();
            $table->decimal('construction_cost', 15, 2)->nullable();
            $table->decimal('total_project_cost', 15, 2)->nullable();
            $table->decimal('total_in_million', 15, 2)->nullable();

            $table->string('project_name');
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('donor_phone');

            $table->string('prove')->nullable(); // file name only

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
