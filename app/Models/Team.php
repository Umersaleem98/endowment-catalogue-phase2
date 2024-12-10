<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'email',
        'designation',
        'gender',
        'image',
        'phone',
        'department',
        'status',
        'social_media',
        'introduction',
    ];
}
