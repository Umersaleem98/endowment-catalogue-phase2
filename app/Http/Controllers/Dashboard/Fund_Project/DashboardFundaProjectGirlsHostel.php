<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GirlsHostelCostEstimate;

class DashboardFundaProjectGirlsHostel extends Controller
{
    public function list()
    {
     $girlsHostel = GirlsHostelCostEstimate::all();
     return view('admin.fundaproeject.girlshostel', compact('girlsHostel'));
    }
}
