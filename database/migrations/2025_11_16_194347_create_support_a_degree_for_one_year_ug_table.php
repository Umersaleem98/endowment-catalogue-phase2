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
        Schema::create('support_a_degree_for_one_year_ug', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->string('degree');
            $table->decimal('fee', 10, 2)->nullable(); // proper storage for amounts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_a_degree_for_one_year_ug');
    }
};
