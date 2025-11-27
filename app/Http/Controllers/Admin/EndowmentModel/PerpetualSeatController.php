<?php

namespace App\Http\Controllers\Admin\EndowmentModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DefultPackagePerpetualSeatDegree;

class PerpetualSeatController extends Controller
{
    public function Defult(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = DefultPackagePerpetualSeatDegree::query();

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

    $perpetual_seat = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.perpetual_seat.defult.list', compact('perpetual_seat', 'search', 'totalItems', 'perPage'));
}
    public function Defult_bulkDelete(Request $request)
{
    $ids = $request->ids;

    if (!$ids || !is_array($ids)) {
        return back()->with('error', 'No records selected.');
    }

    $items = DefultPackagePerpetualSeatDegree::whereIn('id', $ids)->get();

    foreach ($items as $item) {
        // Delete prove file if exists
        if ($item->prove && file_exists(public_path('uploads/perpetualseat-proof/' . $item->prove))) {
            unlink(public_path('uploads/perpetualseat-proof/' . $item->prove));
        }
        $item->delete();
    }

    return back()->with('success', 'Selected records deleted successfully.');
}
}
