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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();   // store image path
            $table->string('phone')->nullable();
            $table->string('status')->default('active'); // 1 = active, 0 = inactive
            $table->text('social_media')->nullable(); // json or text links
            $table->longText('introduction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
