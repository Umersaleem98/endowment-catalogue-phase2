<?php

namespace App\Http\Controllers\Admin\EndowmentModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomPackageOneYearDegree;
use App\Models\DefaultPackageOneYearDegree;

class AnnualController extends Controller
{
    public function Defult(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = DefaultPackageOneYearDegree::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('hostelandmessing', 'like', "%{$search}%")
              ->orWhere('program_type', 'like', "%{$search}%")
              ->orWhere('degree', 'like', "%{$search}%")
              ->orWhere('donor_name', 'like', "%{$search}%")
              ->orWhere('donor_email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('about_partner', 'like', "%{$search}%")
              ->orWhere('philanthropist_text', 'like', "%{$search}%")
              ->orWhere('school', 'like', "%{$search}%")
              ->orWhere('country', 'like', "%{$search}%")
              ->orWhere('year', 'like', "%{$search}%");
        });
    }

    $totalItems = $query->count();

    $oneyear = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.Annual.defult.list', compact('oneyear', 'search', 'totalItems', 'perPage'));
}
   

public function Defult_destroy($id)
{
    $item = DefaultPackageOneYearDegree::findOrFail($id);

    // delete image
    if ($item->prove && file_exists(public_path('uploads/annual-proof/' . $item->prove))) {
        unlink(public_path('uploads/annual-proof/' . $item->prove));
    }

    $item->delete();

    return back()->with('success', 'Record deleted successfully');
}


public function Defult_bulkDelete(Request $request)
    {
        $ids = $request->ids;

        if (!$ids || !is_array($ids)) {
            return back()->with('error', 'No records selected.');
        }

        $items = DefaultPackageOneYearDegree::whereIn('id', $ids)->get();

        foreach ($items as $item) {
            // Delete image file if exists
            if ($item->prove && file_exists(public_path('uploads/annual-proof/' . $item->prove))) {
                unlink(public_path('uploads/annual-proof/' . $item->prove));
            }
            $item->delete();
        }

        return back()->with('success', 'Selected records deleted successfully.');
    }

public function Custom(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = CustomPackageOneYearDegree::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('program_type', 'like', "%{$search}%")
              ->orWhere('degree', 'like', "%{$search}%")
              ->orWhere('donor_name', 'like', "%{$search}%")
              ->orWhere('donor_email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('about_partner', 'like', "%{$search}%")
              ->orWhere('philanthropist_text', 'like', "%{$search}%")
              ->orWhere('school', 'like', "%{$search}%")
              ->orWhere('country', 'like', "%{$search}%")
              ->orWhere('year', 'like', "%{$search}%");
        });
    }

    $totalItems = $query->count();

    $oneyear = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.Annual.custom.list', compact('oneyear', 'search', 'totalItems', 'perPage'));
}


public function Custom_destroy($id)
{
    $item = CustomPackageOneYearDegree::findOrFail($id);

    // Delete file
    if ($item->prove && file_exists(public_path('oneyear_prove/' . $item->prove))) {
        unlink(public_path('oneyear_prove/' . $item->prove));
    }

    // Delete record
    $item->delete();

    return redirect()->back()->with('success', 'Record deleted successfully.');
}

public function Custom_bulkDelete(Request $request)
{
    $ids = $request->input('ids', []);
    if (empty($ids)) {
        return redirect()->back()->with('error', 'No records selected.');
    }

    $items = CustomPackageOneYearDegree::whereIn('id', $ids)->get();

    foreach ($items as $item) {
        // Delete file if exists
        $filePath = public_path('oneyear_prove/' . $item->prove);
        if ($item->prove && file_exists($filePath)) {
            unlink($filePath);
        }
        $item->delete();
    }

    return redirect()->back()->with('success', 'Selected records deleted successfully.');
}


}
