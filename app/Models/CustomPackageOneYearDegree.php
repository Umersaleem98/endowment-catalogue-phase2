<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPackageOneYearDegree extends Model
{
    protected $table = 'custom_package_oneyear_degree';

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
        'country',
        'year',
        'payments_status',
        'prove',
    ];
}
