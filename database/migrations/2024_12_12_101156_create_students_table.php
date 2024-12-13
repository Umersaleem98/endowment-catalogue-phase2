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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key 'id'
            $table->string('qalam_id')->unique(); // Unique 'qalam_id'
            $table->string('student_name'); // 'student_name' column
            $table->string('father_name'); // 'father_name' column
            $table->string('institutions'); // 'institutions' column
            $table->string('discipline'); // 'discipline' column
            $table->string('contact_no'); // 'contact_no' column
            $table->string('home_address'); // 'home_address' column
            $table->string('scholarship_name'); // 'scholarship_name' column
            $table->string('nust_trust_fund_donor_name'); // 'nust_trust_fund_donor_name' column
            $table->string('province'); // 'province' column
            $table->string('domicile'); // 'domicile' column
            $table->string('gender'); // 'gender' column
            $table->string('program'); // 'program' column
            $table->string('degree')->nullable(); // 'degree' column
            $table->year('year_of_admission'); // 'year_of_admission' column
            $table->string('father_status'); // 'father_status' column
            $table->string('father_profession'); // 'father_profession' column
            $table->decimal('monthly_income', 8, 2); // 'monthly_income' column
            $table->text('statement_of_purpose'); // 'statement_of_purpose' column
            $table->text('remarks'); // 'remarks' column
            $table->boolean('make_pledge')->default(false); // 'make_pledge' column (boolean)
            $table->boolean('payment_approved')->default(false); // 'payment_approved' column (boolean)
            $table->string('images')->nullable(); // 'images' column (nullable)
            $table->timestamps(); // 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
