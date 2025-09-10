<?php

namespace App\Http\Controllers\Dashboard\AdopedStudent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdopedStudentController extends Controller
{
 
 public function index(Request $request)
    {
        $query = Student::query();
        $query->where('make_pledge', 1)
          ->where('payment_approved', 1);
        // Filtering logic
        if ($request->qalam_id) $query->where('qalam_id', 'like', "%{$request->qalam_id}%");
        if ($request->student_name) $query->where('student_name', 'like', "%{$request->student_name}%");
        if ($request->father_name) $query->where('father_name', 'like', "%{$request->father_name}%");
        if ($request->institutions) $query->where('institutions', $request->institutions);
        if ($request->discipline) $query->where('discipline', $request->discipline);
        if ($request->scholarship_name) $query->where('scholarship_name', $request->scholarship_name);
        if ($request->province) $query->where('province', $request->province);
        if ($request->domicile) $query->where('domicile', $request->domicile);
        if ($request->gender) $query->where('gender', $request->gender);
        if ($request->program) $query->where('program', $request->program);
        if ($request->degree) $query->where('degree', $request->degree);
        if ($request->year_of_admission) $query->where('year_of_admission', $request->year_of_admission);

        $students = $query->paginate($request->per_page ?? 20);

        // Get unique values for dropdowns
        $institutions = Student::select('institutions')->distinct()->pluck('institutions');
        $disciplines = Student::select('discipline')->distinct()->pluck('discipline');
        $scholarships = Student::select('scholarship_name')->distinct()->pluck('scholarship_name');
        $provinces = Student::select('province')->distinct()->pluck('province');
        $domiciles = Student::select('domicile')->distinct()->pluck('domicile');
        $genders = Student::select('gender')->distinct()->pluck('gender');
        $programs = Student::select('program')->distinct()->pluck('program');
        $degrees = Student::select('degree')->distinct()->pluck('degree');

        return view('admin.AdopedStudent.list', compact(
            'students',
            'institutions',
            'disciplines',
            'scholarships',
            'provinces',
            'domiciles',
            'genders',
            'programs',
            'degrees'
        ));
    }

    public function Unadopted($id)
{
    $student = Student::findOrFail($id); // safer than find()

    $student->make_pledge = 0;
    $student->payment_approved = 0;
    $student->save();

    return redirect()
        ->route('adopted.students.list')
        ->with('success', 'Student has been change status  successfully.');
}


public function UnmarksHostel($id)
{
    $student = Student::findOrFail($id); // safer than find()

    $student->make_pledge = 0;
    $student->payment_approved = 0;
    $student->save();

    return redirect()
        ->route('adopted.students.list')
        ->with('success', 'Student has been change status  successfully.');
}



 public function Edit($id)
    {
        $students = Student::find($id);
        return view('admin.AdopedStudent.edits', compact('students'));
    }


  public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // Validate request
    $request->validate([
        'qalam_id' => 'required|string|max:255',
        'student_name' => 'required|string|max:255',
        'father_name' => 'nullable|string|max:255',
        'institutions' => 'nullable|string|max:255',
        'discipline' => 'nullable|string|max:255',
        'contact_no' => 'nullable|string|max:20',
        'home_address' => 'nullable|string',
        'scholarship_name' => 'nullable|string|max:255',
        'nust_trust_fund_donor_name' => 'nullable|string|max:255',
        'province' => 'nullable|string|max:255',
        'domicile' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:50',
        'program' => 'nullable|string|max:50',
        'degree' => 'nullable|string|max:255',
        'year_of_admission' => 'nullable|integer',
        'father_status' => 'nullable|string|max:50',
        'father_profession' => 'nullable|string|max:255',
        'monthly_income' => 'nullable|numeric',
        'statement_of_purpose' => 'nullable|string',
        'remarks' => 'nullable|string',
        'make_pledge' => 'nullable|boolean',
        'payment_approved' => 'nullable|boolean',
        'hostel_status' => 'nullable|boolean',
        'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('images')) {
        $file = $request->file('images');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('templates/students_images'), $filename);

        // delete old image if exists
        if ($student->images && file_exists(public_path('templates/students_images/' . $student->images))) {
            unlink(public_path('templates/students_images/' . $student->images));
        }

        $student->images = $filename;
    }

    // Update other fields
    $student->update($request->except('images'));

    return redirect()->route('adopted.students.list', $student->id)
                     ->with('success', 'Student updated successfully!');
}



}
