<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportHostelProject extends Model
{
    protected $table = 'support_hostel_project';

    protected $fillable = [
         'donor_name',
        'donor_email',
        'phone',
        'country_code',
        'total_cost',
        'prove',
    ];
}
