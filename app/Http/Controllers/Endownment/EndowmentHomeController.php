<?php

namespace App\Http\Controllers\Endownment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndowmentHomeController extends Controller
{
    public function index()
    {
        return view('template.EndowmentModels.EndowmentIndex');
    }
}
