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


    public function Delete($id)
{
    $record = BoysHostelCostEstimate::findOrFail($id);
    
    // Delete proof image if exists
    if ($record->prove && file_exists(public_path('uploads/fundaprojects_payments_boys-proof/' . $record->prove))) {
        unlink(public_path('uploads/fundaprojects_payments_boys-proof/' . $record->prove));
    }

    $record->delete();

    return redirect()->back()->with('success', 'Payment record deleted successfully!');
}


public function bulkDelete(Request $request)
{
    // Convert comma-separated IDs into an array
    $ids = explode(',', $request->ids);

    // Delete records using the Eloquent model
    BoysHostelCostEstimate::whereIn('id', $ids)->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Selected records deleted successfully!');
}

}
