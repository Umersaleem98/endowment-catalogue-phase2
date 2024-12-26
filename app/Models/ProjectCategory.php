<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'project_categories';

    // Fillable fields
    protected $fillable = [
        'project_name',
        'description',
        'project_image',
        'links',
    ];
}
