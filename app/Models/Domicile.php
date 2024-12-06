<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    protected $table = 'domicile';

    protected $fillable = [
        'domicile', // Add other columns as needed
    ];
}
