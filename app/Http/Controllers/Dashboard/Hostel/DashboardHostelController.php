<?php

namespace App\Http\Controllers\Dashboard\Hostel;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\HostelPayment;
use App\Http\Controllers\Controller;

class DashboardHostelController extends Controller
{
    public function index()
    {
        $hostelpayments = HostelPayment::all();
        return view('admin.Hostel.list', compact('hostelpayments'));
    }

   public function delete($id)
{
    $hostelPayment = HostelPayment::findOrFail($id);

    // If proof file exists, delete it
    if ($hostelPayment->payment_proof && file_exists(public_path('uploads/Hostel-proof/' . $hostelPayment->payment_proof))) {
        unlink(public_path('uploads/Hostel-proof/' . $hostelPayment->payment_proof));
    }

    // Delete record from DB
    $hostelPayment->delete();
 return redirect()
        ->route('hostel.list')
        ->with('success', 'Student hostel status has been updated and payment entry deleted successfully.');
    // return back()->with('success', 'The hostel payment and proof file have been deleted successfully.');
}


        
//     public function Unmark($id)
// {
//     // 1. Update student status
//     $student = Student::findOrFail($id);
//     $student->hostel_status = 0;
//     $student->save();

//     // 2. Delete hostel payment entry by ID (if it exists)
//     $hostelPayment = HostelPayment::find($id);
//     if ($hostelPayment) {
//         $hostelPayment->delete();
//     }

//     return redirect()
//         ->route('hostel.list')
//         ->with('success', 'Student hostel status has been updated and payment entry deleted successfully.');
// }


    }

