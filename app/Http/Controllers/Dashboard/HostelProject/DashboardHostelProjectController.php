<?php

namespace App\Http\Controllers\Dashboard\HostelProject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportHostelProject;

class DashboardHostelProjectController extends Controller
{
    public function index()
    {
        $paymentslist = SupportHostelProject::all();
        return view('admin.HostelProject.index', compact('paymentslist'));
    }

   public function delete($id)
{
    // Find record
    $payment = SupportHostelProject::find($id);

    // Delete proof file if exists
    if ($payment->prove && file_exists(public_path('uploads/projecthostel/' . $payment->prove))) {
        unlink(public_path('uploads/projecthostel/' . $payment->prove));
    }

    // Delete record from DB
    $payment->delete();

    return redirect()
        ->route('hostel.project.payment.list')
        ->with('success', 'Payment record deleted successfully!');
}

public function HostelBulkDelete(Request $request)
{
    $ids = $request->input('ids');

    if (!empty($ids) && is_array($ids)) {
        SupportHostelProject::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('success', 'No records selected for deletion.');
}


}

