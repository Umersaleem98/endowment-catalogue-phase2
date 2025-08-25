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
    $domicile = $request->input('domicile');
    $perPage = $request->input('per_page', 8); // 👈 Default 8

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
    if ($domicile && $domicile !== 'all') {
        $query->where('domicile', $domicile);
    }

    // Sorting
    $query->orderBy('monthly_income', 'asc');
    $query->orderByRaw("CASE WHEN images = 'dummy.png' THEN 1 ELSE 0 END, images");

    // Pagination with perPage
    $students = $query->paginate($perPage)->appends($request->all());

    if ($request->ajax()) {
        $studentsHtml = view('template.support_scholar.partials.students', compact('students'))->render();
        $paginationHtml = view('template.support_scholar.partials.pagination', compact('students'))->render();
        return response()->json(['studentsHtml' => $studentsHtml, 'paginationHtml' => $paginationHtml]);
    }

    $isPledgeApproved = $students->first()->make_pledge ?? 0;
    $isPaymentApproved = $students->first()->payment_approved ?? 0;

    return view('template.support_scholar.index', compact(
        'students','disciplines','domiciles','provinces','isPledgeApproved','isPaymentApproved'
    ));
}

public function student_stories_ind($id)
    {
        // $events = Event::all();
        $students = Student::find($id); // Use findOrFail to handle non-existent IDs gracefully

        // Access the make_pledge and payment_approved attributes with default value 0
        $isPledgeApproved = $students->make_pledge ?? 1;
        $isPaymentApproved = $students->payment_approved ?? 1;

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
            $payment->duration = $request->duration;
            $payment->duration_sum = $request->duration_sum;
            $payment->messing = $request->messing;
            $payment->amount = $request->amount;
            // Handle file upload for 'prove'
            if ($request->hasFile('prove')) {
                $file = $request->file('prove');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/Storypayments-proof'), $filename);
                $payment->prove = 'uploads/Storypayments-proof/' . $filename;
            }

            $payment->payment_approved = $request->payment_approved;
            // dd($payment->save());
            $payment->save();


          

            // Update student's payment_approved status
            $student->payment_approved = 1;
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

        // Update student's pledge status
        $student->make_pledge = 0;
        $student->save();

        // Default status as pending for pledge payment
        $pledgePayment->pledge_approved = 1; 
        $pledgePayment->save();

        // Redirect to student.stories route after success
        return redirect()->route('student.stories')->with('success', 'Pledge payment submitted successfully.');
    }

    return redirect()->back()->with('error', 'Student not found.');
}

    

}
