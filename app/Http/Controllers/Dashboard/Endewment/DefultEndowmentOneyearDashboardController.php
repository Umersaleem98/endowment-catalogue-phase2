<?php

namespace App\Http\Controllers\Dashboard\Endewment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DefaultPackageOneYearDegree;

class DefultEndowmentOneyearDashboardController extends Controller
{
    public function index()
    {
        $oneyears = DefaultPackageOneYearDegree::all();
        return view('admin.defultoneyear.list', compact('oneyears'));
    }
}
