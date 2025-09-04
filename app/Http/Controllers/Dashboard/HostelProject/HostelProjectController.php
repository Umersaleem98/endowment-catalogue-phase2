<?php

namespace App\Http\Controllers\Dashboard\HostelProject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportHostelProject;

class HostelProjectController extends Controller
{
    public function index()
    {
        $paymentslist = SupportHostelProject::all();
        return view('admin.HostelProject.index', compact('paymentslist'));
    }
}
