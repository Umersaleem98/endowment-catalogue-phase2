<?php

namespace App\Http\Controllers\Home\StudentStories;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentPledgePayment;
use App\Models\StudentsStoryPayments;

class StudentStoriesController extends Controller
{
    public function student_stories(Request $request)
    {
            // Fetch distinct filter values from DB
            $genders = \App\Models\Student::select('gender')->distinct()->pluck('gender')->filter()->values();
            $institutions = \App\Models\Student::select('institutions')->distinct()->pluck('institutions')->filter()->values();
            $provinces = \App\Models\Student::select('province')->distinct()->pluck('province')->filter()->values();
            $domiciles = \App\Models\Student::select('domicile')->distinct()->pluck('domicile')->filter()->values();
            $programs = \App\Models\Student::select('program')->distinct()->pluck('program')->filter()->values();

            // Build query
            $query = \App\Models\Student::query();

            if ($request->filled('gender')) {
                $query->where('gender', $request->gender);
            }

            if ($request->filled('institution')) {
                $query->where('institutions', $request->institution);
            }

            if ($request->filled('province')) {
                $query->where('province', $request->province);
            }

            if ($request->filled('domicile')) {
                $query->where('domicile', $request->domicile);
            }

            if ($request->filled('program')) {
                $query->where('program', $request->program);
            }

            // Per page option
            $perPage = $request->input('perpage', 50);
            if ($perPage === 'all') {
                $students = $query->paginate($query->count());
            } else {
                $students = $query->paginate(intval($perPage));
            }

        return view('pages.Home.support_scholar.index', compact('students', 'genders', 'institutions', 'provinces', 'domiciles', 'programs'));
    }





public function student_stories_ind($id)
    {
        // $events = Event::all();
        $students = Student::find($id); // Use findOrFail to handle non-existent IDs gracefully

        // Access the make_pledge and payment_approved attributes with default value 0
        $isPledgeApproved = $students->make_pledge ?? 1;
        $isPaymentApproved = $students->payment_approved ?? 1;

        // dd($isPaymentApproved);

        return view('pages.Home.support_scholar.student_stories', compact('students', 'isPledgeApproved', 'isPaymentApproved'));
    }

    public function payment_index($id)
    {
        $students= Student::find($id);
        return view('pages.Home.support_scholar.payments.payments', compact('students'));
    }


    public function Make_a_Pledge($id)
    {
        $students= Student::find($id);
        return view('pages.Home.support_scholar.payments.pledge', compact('students'));
    }

    public function store(Request $request, $id)
{
    // Validation
    $request->validate([
        'student_name'      => 'required|string|max:255',
        'donor_name'        => 'required|string|max:255',
        'donor_email'       => 'required|email|max:255',
        'phone'             => 'required|string|max:20',
        'duration'          => 'required',
        'duration_sum'      => 'required',
        'amount'            => 'required|numeric',
        'messing'           => 'nullable',
        'prove'             => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
        'payment_approved'  => 'required|in:0,1',
    ]);

    // Find student
    $student = Student::find($id);

    if ($student && $student->payment_approved == 0) {

        $payment = new StudentsStoryPayments();
        $payment->student_name     = $request->student_name;
        $payment->donor_name       = $request->donor_name;
        $payment->donor_email      = $request->donor_email;
        $payment->phone            = $request->phone;
        $payment->duration         = $request->duration;
        $payment->duration_sum     = $request->duration_sum;
        $payment->messing          = $request->messing;
        $payment->amount           = $request->amount;

        // Handle file upload
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/Storypayments-proof';

            // Move file
            $file->move(public_path($path), $filename);

            // Save path into DB
            $payment->prove = $path . '/' . $filename;
        }

        // Payment status
        $payment->payment_approved = $request->payment_approved;

        // Save payment record
        $payment->save();

        // Update student approval
        $student->payment_approved = 1;
        $student->save();

        // Redirect to student stories page
        return redirect()
                ->route('student.stories')
                ->with('success', 'Payment processed successfully.');
    }

    return back()->with('error', 'Student not found or already approved.');
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
        $student->make_pledge = 1;
        $student->save();
        $pledgePayment->save();

        // Redirect to student.stories route after success
        return redirect()->route('student.stories')->with('success', 'Pledge payment submitted successfully.');
    }

    return redirect()->back()->with('error', 'Student not found.');
}

}
