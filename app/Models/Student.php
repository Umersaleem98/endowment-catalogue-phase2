<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    // Mass assignable fields
    protected $fillable = [
        'qalam_id',
        'student_name',
        'father_name',
        'institutions',
        'discipline',
        'contact_no',
        'home_address',
        'scholarship_name',
        'nust_trust_fund_donor_name',
        'province',
        'domicile',
        'gender',
        'program',
        'degree',
        'year_of_admission',
        'father_status',
        'father_profession',
        'monthly_income',
        'statement_of_purpose',
        'remarks',
        'make_pledge',
        'payment_approved',
        'hostel_status',
        'images',
    ];

    // Cast boolean fields to bool automatically
    protected $casts = [
        'make_pledge' => 'boolean',
        'payment_approved' => 'boolean',
        'hostel_status' => 'boolean',
        'year_of_admission' => 'integer',
        'monthly_income' => 'decimal:2',
    ];
}
