<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use Illuminate\Http\Request;
use App\Models\BusinessCenter;
use App\Http\Controllers\Controller;

class DashboardFundaProjectBusinessCenter extends Controller
{
   public function list()
   {
    $businesscenter = BusinessCenter::all();
    return view('admin.fundaproeject.businesscenter', compact('businesscenter'));
   }


   public function Delete($id)
{
    $record = BusinessCenter::findOrFail($id);

    // Delete proof file if exists
    if ($record->prove && file_exists(public_path('uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $record->prove))) {
        unlink(public_path('uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $record->prove));
    }

    $record->delete();

    return redirect()->back()->with('success', 'Record deleted successfully.');
}

    public function BusinessCenterBulkDelete(Request $request)
{
    $ids = $request->input('ids');

    if (!empty($ids) && is_array($ids)) {
        BusinessCenter::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('error', 'No records selected for deletion.');
}

}
