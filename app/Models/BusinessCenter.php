<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCenter extends Model
{
    protected $table = 'business_center';
    protected $fillable = [
        'description',
        'area_sft',
        'quantity',
        'total_area_sft',
        'construction_cost',
        'total_project_cost',
        'total_in_million',
        'project_name',
        'donor_name',
        'donor_email',
        'donor_phone',
        'prove',
    ];
}
