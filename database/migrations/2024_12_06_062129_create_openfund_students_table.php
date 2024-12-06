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
        Schema::create('openfund_students', function (Blueprint $table) {
            $table->id();
            $table->string('qalam_id')->unique();
            $table->string('student_name');
            $table->string('father_name');
            $table->string('institutions');
            $table->string('discipline');
            $table->string('contact_no');
            $table->text('home_address');
            $table->string('scholarship_name');
            $table->string('nust_trust_fund_donor_name');
            $table->string('province');
            $table->string('domicile');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('program');
            $table->string('degree');
            $table->integer('year_of_admission');
            $table->string('father_status');
            $table->string('father_profession');
            $table->decimal('monthly_income', 10, 2);
            $table->text('statement_of_purpose')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('make_pledge')->default(false);
            $table->boolean('payment_approved')->default(false);
            $table->string('images')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openfund_students');
    }
};
