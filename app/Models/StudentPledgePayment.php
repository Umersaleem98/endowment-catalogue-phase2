<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPledgePayment extends Model
{
    protected $table = 'pledge_payments';

    // Define the fillable fields (fields that can be mass-assigned)
    protected $fillable = [
        'student_name',
        'donor_name',
        'donor_email',
        'phone',
        'donation_percent',
        'amount',
        'donation_for',
        'pledge_approved',
    ];
}
