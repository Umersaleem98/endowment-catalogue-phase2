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
            $table->string('country_code', 10)->nullable();
            $table->string('phone');
            $table->decimal('total_cost', 15, 2)->default(0);
            $table->string('prove')->nullable(); // file upload
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
