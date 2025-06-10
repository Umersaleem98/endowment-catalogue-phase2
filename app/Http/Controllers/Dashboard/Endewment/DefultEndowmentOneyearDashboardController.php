<?php

namespace App\Http\Controllers\Dashboard\Endewment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DefaultPackageOneYearDegree;
use App\Models\DefaultPackageFourYearDegree;
use App\Models\DefultPackagePerpetualSeatDegree;

class DefultEndowmentOneyearDashboardController extends Controller
{
    public function index()
    {
        $oneyears = DefaultPackageOneYearDegree::all();
        return view('admin.defultoneyear.list', compact('oneyears'));

    }
    public function indexforyear()
    {
        $fouryears = DefaultPackageFourYearDegree::all();
        return view('admin.defultfouryear.list', compact('fouryears'));
    }
    
    public function indexperpetualseat()
    {
        $perpetualseat = DefultPackagePerpetualSeatDegree::all();
        return view('admin.defultperpetualseat.list', compact('perpetualseat'));
    }

    public function Delete($id)
    {
        $oneyears = DefaultPackageOneYearDegree::find($id);

         if ($oneyears->prove && file_exists(public_path('uploads/Oneyear-proof/' . $oneyears->prove))) {
        unlink(public_path('uploads/Oneyear-proof/' . $oneyears->prove));
    }

    $oneyears->delete();

    return redirect()->back()->with('success', 'Record deleted successfully.');

        
    }
}
