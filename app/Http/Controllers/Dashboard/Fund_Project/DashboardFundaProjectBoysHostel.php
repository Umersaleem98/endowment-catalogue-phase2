<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BoysHostelCostEstimate;

class DashboardFundaProjectBoysHostel extends Controller
{
    public function list()
    {
     $boysHostel = BoysHostelCostEstimate::all();
     return view('admin.fundaproeject.boyshostel', compact('boysHostel'));
    }
}
