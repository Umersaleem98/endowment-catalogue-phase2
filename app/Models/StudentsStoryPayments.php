<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsStoryPayments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'student_name',
        'donor_name',   
        'donor_email',
        'phone',
        'duration',
        'duration_sum',
        'messing',
        'amount',
        'prove',
        'payment_approved',
    ];
}
