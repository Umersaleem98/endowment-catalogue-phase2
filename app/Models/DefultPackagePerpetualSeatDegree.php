<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefultPackagePerpetualSeatDegree extends Model
{
    protected $table = 'defult_perpetual_seat_packager_degree';

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
