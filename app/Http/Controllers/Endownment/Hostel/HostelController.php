<?php

namespace App\Http\Controllers\Endownment\Hostel;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\HostelPayment;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index($id)
    {
        $students = Student::find($id);
        $schools = School::all();
        $countries = Country::all();
        return view('template.Hostel.index', compact('students', 'schools', 'countries'));
    }

    public function store(Request $request, $id)
    {

        // dd();
        // Find the student using the ID from the URL
        $student = Student::find($id);

        // Check if the student exists and hostel status is valid
        if (!$student || $student->hostel_status != 0) {
            return redirect()->back()->with('error', 'Student not found or not eligible for hostel payment.');
        }

        // Create a new hostel payment record
        $hostelPayment = new HostelPayment();
        $hostelPayment->student_name = $request->student_name;
        $hostelPayment->donor_name = $request->donor_name;
        $hostelPayment->donor_email = $request->donor_email ?? 'N/A'; // Default if null
        $hostelPayment->phone = $request->phone;
        $hostelPayment->duration = $request->duration;
        $hostelPayment->amount = $request->amount;
        $hostelPayment->payment_type = $request->payment_type;
       
        // Handle file upload for 'payment_proof'
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/Hostel-proof'), $filename);
            $hostelPayment->payment_proof = 'uploads/Hostel-proof/' . $filename;
        }

        $hostelPayment->save(); // Save hostel payment record

        // Update student's hostel status (if needed)
        $student->hostel_status = 1;
        $student->save();
       
         return redirect()->route('student.stories')->with('success', 'Pledge payment submitted successfully.');
    }
}
