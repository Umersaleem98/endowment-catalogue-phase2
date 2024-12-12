<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPackageFourYearDegree extends Model
{
    protected $table = 'custom_package_fouryear_degree';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'program_type',
        'degree',
        'seats',
        'totalAmount',
        'donor_name',
        'donor_email',
        'phone',
        'about_partner',
        'philanthropist_text',
        'school',
        'country',
        'year',
        'payments_status',
        'prove',
    ];
}
