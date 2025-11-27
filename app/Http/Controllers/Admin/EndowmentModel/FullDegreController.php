<?php

namespace App\Http\Controllers\Admin\EndowmentModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomPackageFourYearDegree;
use App\Models\DefaultPackageFourYearDegree;

class FullDegreController extends Controller
{
     public function Defult(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = DefaultPackageFourYearDegree::query();

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

    $fouryear = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.FullDegree.defult.list', compact('fouryear', 'search', 'totalItems', 'perPage'));
}
    


public function Defult_bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!$ids || !is_array($ids)) {
        return back()->with('error', 'No records selected.');
    }

    $items = DefaultPackageFourYearDegree::whereIn('id', $ids)->get();

    foreach ($items as $item) {
        // Delete image file if exists
        if ($item->prove && file_exists(public_path('uploads/fulldegree-proof/' . $item->prove))) {
            unlink(public_path('uploads/fulldegree-proof/' . $item->prove));  // Fix path here
        }
        $item->delete();
    }

    return back()->with('success', 'Selected records deleted successfully.');
}


public function Custom(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = CustomPackageFourYearDegree::query();

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

    $fouryear = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.FullDegree.custom.list', compact('fouryear', 'search', 'totalItems', 'perPage'));
}

public function custom_bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!$ids || !is_array($ids)) {
        return back()->with('error', 'No records selected.');
    }

    $items = CustomPackageFourYearDegree::whereIn('id', $ids)->get();

    foreach ($items as $item) {
        // Delete prove file if exists
        if ($item->prove && file_exists(public_path('uploads/fulldegree-proof/' . $item->prove))) {
            unlink(public_path('uploads/fulldegree-proof/' . $item->prove));
        }
        $item->delete();
    }

    return back()->with('success', 'Selected records deleted successfully.');
}

}
