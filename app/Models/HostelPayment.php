<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelPayment extends Model
{
    protected $table = 'hostel_payments';

    protected $fillable = [
        'student_name',
        'donor_name',
        'donor_email',
        'phone',
        'duration',
        'amount',
        'payment_type',
        'payment_proof'
    ];
}
