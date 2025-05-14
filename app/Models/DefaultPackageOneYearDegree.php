<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultPackageOneYearDegree extends Model
{
    protected $table = 'default_package_oneyear_degree';

    protected $fillable = [
        'hostelandmessing',
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
