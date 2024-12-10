<?php

namespace App\Http\Controllers\Dashboard\Endewment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomPackageOneYearDegree;
use App\Models\CustomPackageFourYearDegree;
use App\Models\CustomPackagePerpetualSeatDegree;

class CustomEndowmentOneyearDashboardController extends Controller
{
    public function index()
    {
        $oneyears = CustomPackageOneYearDegree::all();
        return view('admin.customoneyear.list', compact('oneyears'));
    }
    public function indexforyear()
    {
        $fouryears = CustomPackageFourYearDegree::all();
        return view('admin.customfouryear.list', compact('fouryears'));
    }
    
    public function indexperpetualseat()
    {
        $perpetualseat = CustomPackagePerpetualSeatDegree::all();
        return view('admin.customperpetualseat.list', compact('perpetualseat'));
    }
}
