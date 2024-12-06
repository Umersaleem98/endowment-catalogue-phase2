<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndoementZakatPayment extends Model
{
    protected $table = 'endowment_zakat_payments';
    protected $fillable = [
        'payment_type',
        'donor_name',
        'donor_email',
        'phone',
        'duration',
        'amount',
        'prove',
    ];
}
