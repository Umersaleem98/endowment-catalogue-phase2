<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceMobilizationOfficerController extends Controller
{
    public function index()
    {
        return view('template.pages.r_m_o');
    }
}
