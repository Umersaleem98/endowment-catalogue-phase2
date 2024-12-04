<?php

namespace App\Http\Controllers\Endownment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;

class EndowmentHomeController extends Controller
{
    public function index()
    {
       
        return view('template.EndowmentModels.EndowmentIndex');
    }
}
