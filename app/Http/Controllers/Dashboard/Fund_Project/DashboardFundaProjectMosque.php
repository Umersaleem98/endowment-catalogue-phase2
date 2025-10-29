<?php

namespace App\Http\Controllers\Dashboard\Fund_Project;

use App\Models\Mosque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardFundaProjectMosque extends Controller
{
    public function list()
    {
     $mosque = Mosque::all();
     return view('admin.fundaproeject.mosque', compact('mosque'));
    }


    public function Delete($id)
{
    $record = Mosque::findOrFail($id);

    // Delete proof file if exists
    if ($record->prove && file_exists(public_path('uploads/fundaprojects_payments_mosque-proof/' . $record->prove))) {
        unlink(public_path('uploads/fundaprojects_payments_mosque-proof/' . $record->prove));
    }

    $record->delete();

    return redirect()->back()->with('success', 'Record deleted successfully.');
}


public function MosqueBulkDelete(Request $request)
{
    $ids = $request->input('ids');

    // Handle both array and string input safely
    if (is_string($ids)) {
        $ids = explode(',', $ids);
    }

    if (!empty($ids) && is_array($ids)) {
        Mosque::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('error', 'No records selected for deletion.');
}



}
