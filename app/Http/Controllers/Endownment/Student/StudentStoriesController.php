<?php

namespace App\Http\Controllers\Endownment\Student;

use App\Models\Student;
use App\Models\Domicile;
use App\Models\Province;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;
use App\Models\StudentPledgePayment;
use App\Models\StudentsStoryPayments;

class StudentStoriesController extends Controller
{ 
    
    public function student_stories(Request $request)
{

    $disciplines = Discipline::all();
    $domiciles = Domicile::all();
    $provinces = Province::all();

    $gender = $request->input('gender');
    $province = $request->input('province');
    $discipline = $request->input('discipline');
    $degree = $request->input('degree');
    $domicile = $request->input('domicile'); // Add city filter

    $query = Student::query();

    if ($gender && $gender !== 'all') {
        $query->where('gender', $gender);
    }

    if ($province && $province !== 'all') {
        $query->where('province', $province);
    }

    if ($discipline && $discipline !== 'all') {
        $query->where('discipline', $discipline);
    }

    if ($degree && $degree !== 'all') {
        $query->where('degree', $degree);
    }

    if ($domicile && $domicile !== 'all') { // Add city condition
        $query->where('domicile', $domicile);
    }

    // Sort the query by monthly_income in ascending order
    $query->orderBy('monthly_income', 'asc');

    // Additional sorting logic if needed
    $query->orderByRaw("CASE WHEN images = 'dummy.png' THEN 1 ELSE 0 END, images");

    $students = $query->paginate(8);

    if ($request->ajax()) {
        $studentsHtml = view('template.support_scholar.partials.students', compact('students'))->render();
        $paginationHtml = view('template.support_scholar.partials.pagination', compact('students'))->render();
        return response()->json(['studentsHtml' => $studentsHtml, 'paginationHtml' => $paginationHtml]);
    }

    // Determine if pledge and payment are approved based on the first student in the collection
    $isPledgeApproved = $students->first()->make_pledge ?? 0;
    $isPaymentApproved = $students->first()->payment_approved ?? 0;

    return view('template.support_scholar.index', compact('students','disciplines', 'domiciles','provinces','isPledgeApproved', 'isPaymentApproved'));
}

public function student_stories_ind($id)
    {
        // $events = Event::all();
        $students = Student::find($id); // Use findOrFail to handle non-existent IDs gracefully

        // Access the make_pledge and payment_approved attributes with default value 0
        $isPledgeApproved = $students->make_pledge ?? 0;
        $isPaymentApproved = $students->payment_approved ?? 0;

        // dd($isPaymentApproved);

        return view('template.support_scholar.student_stories', compact('students', 'isPledgeApproved', 'isPaymentApproved'));
    }

    public function payment_index($id)
    {
        $students= Student::find($id);
        return view('template.support_scholar.payments.payments', compact('students'));
    }


    public function Make_a_Pledge($id)
    {
        $students= Student::find($id);
        return view('template.support_scholar.payments.pledge', compact('students'));
    }


    public function store(Request $request, $id)
    {
        // Find the student using the ID from the URL
        $student = Student::find($id);

        // Check if the student exists and the payment is not approved
        if ($student && $student->payment_approved == 1) {
            // Create a new payment record
            $payment = new StudentsStoryPayments();
            $payment->student_name = $request->student_name;
            $payment->donor_name = $request->donor_name;
            $payment->donor_email = $request->donor_email;
            $payment->phone = $request->phone_number;
            $payment->amount = $request->amount;
            $payment->donation_percent = $request->donation_percent ?? null; // Add if applicable
            $payment->donation_for = $request->donation_for ?? null; // Add if applicable
            $payment->duration = $request->duration;

            // Handle file upload for 'prove'
            if ($request->hasFile('prove')) {
                $file = $request->file('prove');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/Storypayments-proof'), $filename);
                $payment->prove = 'uploads/Storypayments-proof/' . $filename;
            }

            $payment->payment_approved = $request->payment_approved;
            $payment->save();

            // Update student's payment_approved status
            $student->payment_approved = 0;
            $student->save();

            return redirect()->back()->with('success', 'Payment processed successfully.');
        }

        return redirect()->back()->with('error', 'Student not found or payment is already approved.');
    }
    
  

    public function pledgestore(Request $request, $id)
    {
        // Find the student by ID
        $student = Student::find($id);
    
        if ($student) {
            // Validate the incoming request
            $request->validate([
                'donor_name' => 'required|string|max:255',
                'donor_email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'donation_percent' => 'required|integer',
                'amount' => 'required|numeric',
                'donation_for' => 'required|string',
            ]);
    
            // Create a new pledge payment record
            $pledgePayment = new StudentPledgePayment();
            $pledgePayment->student_name = $student->student_name;
            $pledgePayment->donor_name = $request->donor_name;
            $pledgePayment->donor_email = $request->donor_email;
            $pledgePayment->phone = $request->phone;
            $pledgePayment->donation_percent = $request->donation_percent;
            $pledgePayment->amount = $request->amount;
            $pledgePayment->donation_for = $request->donation_for;
    
            // Set the student's make_pledge value to 0 (assuming you want to update the student's make_pledge status)
            $student->make_pledge = 0;  // Setting the make_pledge attribute to 0
    
            // Save the changes to the student model
            $student->save();
    
            // Default status as pending for pledge payment
            $pledgePayment->pledge_approved = 0; // Default status as pending
            $pledgePayment->save();
    
            return redirect()->back()->with('success', 'Pledge payment submitted successfully.');
        }
    
        return redirect()->back()->with('error', 'Student not found.');
    }
    

}
