<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPackagePerpetualSeatDegree extends Model
{
    protected $table = 'custom_perpetual_seat_packager_degree';

    protected $fillable = [
        'program',
        'endoement_type',
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
