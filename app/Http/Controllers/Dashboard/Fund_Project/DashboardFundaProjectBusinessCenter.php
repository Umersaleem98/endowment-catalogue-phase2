<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use Illuminate\Http\Request;
use App\Models\BusinessCenter;
use App\Http\Controllers\Controller;

class DashboardFundaProjectBusinessCenter extends Controller
{
   public function list()
   {
    $businesscenter = BusinessCenter::all();
    return view('admin.fundaproeject.businesscenter', compact('businesscenter'));
   }
    
}
