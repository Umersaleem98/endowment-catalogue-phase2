<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsStoryPayments extends Model
{
    protected $table = 'studetns_stories_payments';

    protected $fillable = [
        'student_name',
        'donor_name',
        'donor_email',
        'phone',
        'amount',
        'donation_percent',
        'donation_amount',
        'donation_for',
        'duration',
        'prove',
        'payment_approved',
    ];
}
