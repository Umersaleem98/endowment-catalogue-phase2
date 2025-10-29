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

    public function DeleteOneyear($id)
{
    $oneyears = CustomPackageOneYearDegree::find($id);
    $oneyears->delete();

    return redirect()
        ->route('custom.oneyear.endowment.list') // 👈 change this to your listing route name
        ->with('success', 'Zakat payment deleted successfully.');
}


public function CustomOneyearbulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!empty($ids)) {
        \DB::table('custom_package_oneyear_degree')->whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('error', 'No records selected for deletion.');
}



    public function indexforyear()
    {
        $fouryears = CustomPackageFourYearDegree::all();
        return view('admin.customfouryear.list', compact('fouryears'));
    }

   
    public function Deletefouryear($id)
{
    $oneyears = CustomPackageFourYearDegree::find($id);
    $oneyears->delete();

    return redirect()
        ->route('custom.fouryear.endowment.list') // 👈 change this to your listing route name
        ->with('success', 'Zakat payment deleted successfully.');
}


public function CustomFouryearbulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!empty($ids)) {
        \DB::table('custom_package_fouryear_degree')->whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('error', 'No records selected for deletion.');
}


    
    public function indexperpetualseat()
    {
        $perpetualseat = CustomPackagePerpetualSeatDegree::all();
        return view('admin.customperpetualseat.list', compact('perpetualseat'));
    }
}
