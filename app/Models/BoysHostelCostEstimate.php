<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoysHostelCostEstimate extends Model
{
    protected $table = 'boys_hostel_cost_estimates';

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
