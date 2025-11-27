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
        Schema::create('mosques', function (Blueprint $table) {
            $table->id();
             $table->text('description')->nullable();
            $table->string('area_sft')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('total_area_sft')->nullable();
            $table->string('construction_cost')->nullable();
            $table->string('total_project_cost')->nullable();
            $table->string('total_cost_in_million')->nullable();

            $table->string('project_name')->nullable();

            $table->string('donor_name')->nullable();
            $table->string('donor_email')->nullable();
            $table->string('donor_phone')->nullable();

            $table->string('prove')->nullable(); // file upload path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};
