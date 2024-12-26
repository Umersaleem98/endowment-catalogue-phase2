<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    protected $table = 'mosques';
    
    protected $fillable = [
        'description',
        'area_sft',
        'quantity',
        'total_area_sft',
        'construction_cost',
        'total_project_cost',
        'total_cost_in_million',
        'project_name',
        'donor_name',
        'donor_email',
        'donor_phone',
        'prove',
    ];
}
