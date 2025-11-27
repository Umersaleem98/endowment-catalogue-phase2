<?php

namespace App\Http\Controllers\Home\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceMobilizationOfficerController extends Controller
{
    public function index()
    {
        return view('pages.Home.pages.r_m_o');
    }
}
