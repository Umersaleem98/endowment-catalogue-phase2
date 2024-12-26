<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use App\Models\Mosque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardFundaProjectMosque extends Controller
{
    public function list()
    {
     $mosque = Mosque::all();
     return view('admin.fundaproeject.mosque', compact('mosque'));
    }
}
