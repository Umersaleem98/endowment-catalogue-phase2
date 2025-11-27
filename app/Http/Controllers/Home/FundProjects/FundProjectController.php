<?php

namespace App\Http\Controllers\Home\FundProjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FundProjectController extends Controller
{
    public function index()
    {
        return view('pages.Home.FundProjects.index');
    }
}
