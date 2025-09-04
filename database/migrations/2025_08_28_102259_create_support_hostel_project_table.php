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
        Schema::create('support_hostel_project', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('phone');
            $table->string('country_code', 10); // e.g. +92, +1
            $table->decimal('total_cost', 15, 2);
            $table->string('prove')->nullable(); // proof file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_hostel_project');
    }
};
