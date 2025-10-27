<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GirlsHostelCostEstimate;

class DashboardFundaProjectGirlsHostel extends Controller
{
    public function list()
    {
     $girlsHostel = GirlsHostelCostEstimate::all();
     return view('admin.fundaproeject.girlshostel', compact('girlsHostel'));
    }

    public function Delete($id)
{
    $record = GirlsHostelCostEstimate::findOrFail($id);

    // Delete proof image if it exists
    if ($record->prove && file_exists(public_path('uploads/fundaprojects_payments_girls-proof/' . $record->prove))) {
        unlink(public_path('uploads/fundaprojects_payments_girls-proof/' . $record->prove));
    }

    $record->delete();

    return redirect()->back()->with('success', 'Payment record deleted successfully!');
}

}
