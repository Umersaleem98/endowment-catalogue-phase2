<?php

namespace App\Http\Controllers\Dashboard\AdopedStudent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdopedStudentController extends Controller
{
    public function index(Request $request)
{
    // $adopedstudents = Student::where('payment_approved', 0)
    //                           ->orWhere('make_pledge', 0)
    //                           ->get();

    // return view('admin.AdopedStudent.list', compact('adopedstudents'));
    
        $query = Student::query();

        // ✅ Only students where make_pledge = 0 AND payment_approved = 0
        $query->where('payment_approved', 0)
                              ->orWhere('make_pledge', 0)
                              ->get();

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

}
