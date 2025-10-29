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

        public function DeleteOneyear($id)
    {
            $oneyears = DefaultPackageOneYearDegree::find($id);

            if ($oneyears->prove && file_exists(public_path('uploads/Oneyear-proof/' . $oneyears->prove))) {
            unlink(public_path('uploads/Oneyear-proof/' . $oneyears->prove));
        }

        $oneyears->delete();

        return redirect()
            ->route('oneyear.endowment.list') // 👈 change this to your listing route name
            ->with('success', 'Zakat payment deleted successfully.');

        
    }


    public function DefultOnebulkDelete(Request $request)
{
    $ids = $request->input('selected_ids', []);
    
    if (!empty($ids)) {
        \App\Models\DefaultPackageOneYearDegree::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully.');
    }

    return redirect()->back()->with('error', 'No records selected.');
}



    public function indexforyear()
    {
        $fouryears = DefaultPackageFourYearDegree::all();
        return view('admin.defultfouryear.list', compact('fouryears'));
    }


     public function DeleteFouryear($id)
    {
            $fouryears = DefaultPackageFourYearDegree::find($id);

            if ($fouryears->prove && file_exists(public_path('uploads/Fouryear-proof/' . $fouryears->prove))) {
            unlink(public_path('uploads/Fouryear-proof/' . $fouryears->prove));
        }

        $fouryears->delete();

        return redirect()
            ->route('fouryear.endowment.list') // 👈 change this to your listing route name
            ->with('success', 'Zakat payment deleted successfully.');

        
    }
    
    public function DefultFourbulkDelete(Request $request)
{
    $ids = $request->input('selected_ids', []);
    
    if (!empty($ids)) {
        \App\Models\DefaultPackageFourYearDegree::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully.');
    }

    return redirect()->back()->with('error', 'No records selected.');
}





    public function indexperpetualseat()
    {
        $perpetualseat = DefultPackagePerpetualSeatDegree::all();
        return view('admin.defultperpetualseat.list', compact('perpetualseat'));
    }


     public function Deleteperpetualseat($id)
    {
        $perpetualseat = DefultPackagePerpetualSeatDegree::find($id);

         if ($perpetualseat->prove && file_exists(public_path('uploads/perpetualseat-proof/' . $perpetualseat->prove))) {
        unlink(public_path('uploads/perpetualseat-proof/' . $perpetualseat->prove));
    }

    $perpetualseat->delete();

    return redirect()
        ->route('perpetualseat.endowment.list') // 👈 change this to your listing route name
        ->with('success', 'Zakat payment deleted successfully.');

        
    }


    public function DefultPerpetualbulkDelete(Request $request)
{
    $ids = $request->input('selected_ids', []);

    if (!empty($ids)) {
        DefultPackagePerpetualSeatDegree::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully.');
    }

    return redirect()->back()->with('error', 'No records selected.');
}



}
