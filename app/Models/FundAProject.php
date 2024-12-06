<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundAProject extends Model
{
    protected $table = 'fund_a_project_payments';

    protected $fillable = [
        'project_name',
        'donor_name',
        'donor_email',
        'phone',
        'amount_for',
        'amount',
        'prove',
    ];
}
