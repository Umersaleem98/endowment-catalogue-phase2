<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
     public function create()
    {
        return view('pages.admin.students.create');
    }

    public function store(Request $request)
    {
        $student = new Student();

        $student->qalam_id = $request->qalam_id;
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->institutions = $request->institutions;
        $student->discipline = $request->discipline;
        $student->contact_no = $request->contact_no;
        $student->home_address = $request->home_address;
        $student->scholarship_name = $request->scholarship_name;
        $student->nust_trust_fund_donor_name = $request->nust_trust_fund_donor_name;
        $student->province = $request->province;
        $student->domicile = $request->domicile;
        $student->gender = $request->gender;
        $student->program = $request->program;
        $student->degree = $request->degree;
        $student->year_of_admission = $request->year_of_admission;
        $student->father_status = $request->father_status;
        $student->father_profession = $request->father_profession;
        $student->monthly_income = $request->monthly_income;
        $student->statement_of_purpose = $request->statement_of_purpose;
        $student->remarks = $request->remarks;

        // Checkbox fields: if not checked, they won't be in request, so set default 0
        $student->make_pledge = $request->has('make_pledge') ? 1 : 0;
        $student->payment_approved = $request->has('payment_approved') ? 1 : 0;
        $student->hostel_status = $request->has('hostel_status') ? 1 : 0;

        // Image Upload
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/students'), $imageName);
            $student->images = $imageName;
        } else {
            $student->images = null;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

      public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('pages.admin.students.edit', compact('student'));
}


public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // -----------------------------
    // VALIDATION
    // -----------------------------
    $request->validate([
        'qalam_id' => 'required|numeric',
        'student_name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'institutions' => 'required|string|max:255',
        'discipline' => 'required|string|max:255',
        'contact_no' => 'required|numeric',
        'home_address' => 'required|string',
        'monthly_income' => 'required|numeric',
        'degree' => 'required|string',
        'gender' => 'required|string',
        'father_status' => 'required|string',

        // Image validation
        'images' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
    ]);

    // -----------------------------
    // UPDATE FIELDS
    // -----------------------------
    $student->qalam_id = $request->qalam_id;
    $student->student_name = $request->student_name;
    $student->father_name = $request->father_name;
    $student->institutions = $request->institutions;
    $student->discipline = $request->discipline;
    $student->contact_no = $request->contact_no;
    $student->home_address = $request->home_address;
    $student->scholarship_name = $request->scholarship_name;
    $student->nust_trust_fund_donor_name = $request->nust_trust_fund_donor_name;
    $student->province = $request->province;
    $student->domicile = $request->domicile;
    $student->gender = $request->gender;
    $student->program = $request->program;
    $student->degree = $request->degree;
    $student->year_of_admission = $request->year_of_admission;
    $student->father_status = $request->father_status;
    $student->father_profession = $request->father_profession;
    $student->monthly_income = $request->monthly_income;
    $student->statement_of_purpose = $request->statement_of_purpose;
    $student->remarks = $request->remarks;

    // Dropdown value handling
    $student->make_pledge = $request->make_pledge;
    $student->payment_approved = $request->payment_approved;
    $student->hostel_status = $request->hostel_status;

    // -----------------------------
    // IMAGE UPLOAD
    // -----------------------------
    if ($request->hasFile('images')) {

        // Delete OLD image
        if ($student->images && file_exists(public_path('uploads/students/' . $student->images))) {
            unlink(public_path('uploads/students/' . $student->images));
        }

        // Upload new
        $image = $request->file('images');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/students'), $imageName);

        $student->images = $imageName;
    }

    $student->save();

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}



 public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10); // default 10

    $studentsQuery = Student::query();

    // 🔥 Only show students where make_pledge = 0, payment_approved = 0, hostel_status = 0
    $studentsQuery->where('make_pledge', 0)
                  ->where('payment_approved', 0)
                  ->where('hostel_status', 0);

    // 🔎 Search filter
    if ($search) {
        $studentsQuery->where(function($query) use ($search) {
            $query->where('qalam_id', 'like', "%{$search}%")
                ->orWhere('student_name', 'like', "%{$search}%")
                ->orWhere('year_of_admission', 'like', "%{$search}%")
                ->orWhere('father_name', 'like', "%{$search}%")
                ->orWhere('institutions', 'like', "%{$search}%")
                ->orWhere('discipline', 'like', "%{$search}%")
                ->orWhere('contact_no', 'like', "%{$search}%")
                ->orWhere('province', 'like', "%{$search}%")
                ->orWhere('domicile', 'like', "%{$search}%")
                ->orWhere('gender', 'like', "%{$search}%")
                ->orWhere('degree', 'like', "%{$search}%");
        });
    }

    // Total count before pagination
    $totalStudents = (clone $studentsQuery)->count();

    // Pagination
    $students = $studentsQuery->orderBy('id', 'desc')
                              ->paginate($perPage)
                              ->withQueryString();

    return view('pages.admin.students.list', compact('students', 'search', 'totalStudents', 'perPage'));
}

public function Adopted($id)
{
    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update fields
    $student->make_pledge = 1;
    $student->payment_approved = 1;

    // Save changes
    $student->save();

    // Redirect back to students.index with success message
    return redirect()->route('students.index')->with('success', 'Student status updated successfully.');
}

public function AdoptedHostel($id)
{
    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update fields
    $student->hostel_status = 1;

    // Save changes
    $student->save();

    // Redirect back to students.index with success message
    return redirect()->route('students.index')->with('success', 'Student Hostel status updated successfully.');
}


    
public function delete($id)
{
    $student = Student::find($id);

    $student->delete();

    return redirect()->back()->with('success', 'The entry was deleted successfully.');
}


public function bulkDelete(Request $request)
{
    $ids = $request->input('ids');

    if (!is_array($ids) || count($ids) === 0) {
        return redirect()->route('students.index')->with('error', 'No students selected for delete.');
    }

    Student::whereIn('id', $ids)->delete();

    return redirect()->route('students.index')->with('success', 'Selected students deleted successfully.');
}



}

