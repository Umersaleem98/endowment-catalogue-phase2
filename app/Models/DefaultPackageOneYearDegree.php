<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultPackageOneYearDegree extends Model
{
    protected $table = 'default_package_one_year_degrees';

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
