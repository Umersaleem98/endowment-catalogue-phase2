<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\UniqueConstraintViolationException; // Add this

class StudentDashboardController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Student::query();
        $query->where('make_pledge', 0)
          ->where('payment_approved', 0);
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

        return view('admin.students.list', compact(
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

    public function create()
    {
        return view('admin.students.add');
    }

    public function store(Request $request)
{
    
    $student = new Student();

    $student->qalam_id = $request->input('qalam_id');
    $student->student_name = $request->input('student_name');
    $student->father_name = $request->input('father_name');
    $student->institutions = $request->input('institutions');
    $student->discipline = $request->input('discipline');
    $student->contact_no = $request->input('contact_no');
    $student->home_address = $request->input('home_address');
    $student->scholarship_name = $request->input('scholarship_name');
    $student->nust_trust_fund_donor_name = $request->input('nust_trust_fund_donor_name');
    $student->province = $request->input('province');
    $student->domicile = $request->input('domicile');
    $student->gender = $request->input('gender');
    $student->program = $request->input('program');
    $student->degree = $request->input('degree');
    $student->year_of_admission = $request->input('year_of_admission');
    $student->father_status = $request->input('father_status');
    $student->father_profession = $request->input('father_profession');
    $student->monthly_income = $request->input('monthly_income');
    $student->statement_of_purpose = $request->input('statement_of_purpose');
    $student->remarks = $request->input('remarks');
    $student->make_pledge = $request->input('make_pledge');
    $student->payment_approved = $request->input('payment_approved');
    $student->hostel_status = $request->input('hostel_status');

    // image upload
    if ($request->hasFile('images')) {
        $imageName = time() . '.' . $request->file('images')->extension();
        $request->file('images')->move(public_path('templates/students_images'), $imageName);
        $student->images = $imageName;
    }

    $student->save();

    return redirect()->route('students.index')->with('success', 'Student added successfully!');
}


public function Edit($id)
{
    $student = Student::find($id);
    return view('admin.students.edits', compact('student'));
}


        public function Update(Request $request, $id)
{
    $student = Student::findOrFail($id);
// dd();
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

    return redirect()->back()
                 ->with('success', 'Student updated successfully!');
}

    public function Delete($id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

public function importExcel(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv'
    ]);

    try {
        // Attempt the import using the StudentsImport class 
        // (which should be using updateOrCreate to handle duplicates)
        Excel::import(new StudentsImport, $request->file('file'));

        return back()->with('success', 'Students imported successfully! 🎉');

    } catch (UniqueConstraintViolationException $e) {
        // This handles if a duplicate qalam_id still sneaks through or if updateOrCreate fails.
        // NOTE: If you are using updateOrCreate in StudentsImport, this is less likely.
        $errorMessage = 'Import failed due to a duplicate entry. Check your Excel file for repeated Qalam IDs (e.g., 413514).';
        return back()->with('error', $errorMessage);

    } catch (QueryException $e) {
        // This handles the "Column 'make_pledge' cannot be null" type of error.
        if (str_contains($e->getMessage(), '1048 Column')) {
            $columnName = explode('Column ', $e->getMessage())[1] ?? 'a required column';
            $columnName = explode(' cannot be null', $columnName)[0];
            
            $errorMessage = "Import failed: Data missing for the required column {$columnName}. Please ensure all cells for required fields are filled.";
        } else {
            $errorMessage = 'Database Error during import: ' . $e->getMessage();
        }
        return back()->with('error', $errorMessage);

    } catch (Exception $e) {
        // Catch all other import-related errors (e.g., file structure issues)
        $errorMessage = 'An unexpected error occurred during import: ' . $e->getMessage();
        return back()->with('error', $errorMessage);
    }
}


    // public function importExcel(Request $request)
    // {

    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv'
    //     ]);

    //     Excel::import(new StudentsImport, $request->file('file'));

    //     return back()->with('success', 'Students imported successfully!');
    // }

    public function exportSelected(Request $request)
    {
        $request->validate([
            'selected_students' => 'required|array|min:1'
        ], [
            'selected_students.required' => 'Please select at least one student to export.'
        ]);

        return Excel::download(
            new StudentsExport($request->selected_students),
            'students.xlsx'
        );
    }


    public function deleteSelected(Request $request)
    {
        $ids = $request->input('selected_students', []);
        if (empty($ids)) {
            return redirect()->route('students.index')
                ->with('error', 'No students selected for deletion.');
        }

        Student::whereIn('id', $ids)->delete();

        return redirect()->route('students.index')
            ->with('success', 'Selected students deleted successfully.');
    }

   

    public function Adopted($id)
{
    $student = Student::findOrFail($id); // safer than find()

    $student->make_pledge = 1;
    $student->payment_approved = 1;
    $student->save();

    return redirect()
        ->route('students.index')
        ->with('success', 'Student has been marked as adopted successfully.');
}
   


}
