<?php

namespace App\Http\Controllers\Admin\AdoptedStudent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdoptedStudentController extends Controller
{

   public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10); // default 10

    $studentsQuery = Student::query()
        ->where('make_pledge', 1)
        ->where('payment_approved', 1);   // show only adopted students

    // Search filter
    if ($search) {
        $studentsQuery->where(function($query) use ($search) {
            $query->where('qalam_id', 'like', "%{$search}%")
                ->orWhere('student_name', 'like', "%{$search}%")
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

    // total count without pagination
    $totalStudents = (clone $studentsQuery)->count();

    // paginate
    $students = $studentsQuery->orderBy('id', 'desc')
        ->paginate($perPage)
        ->withQueryString();

    return view('pages.admin.AdoptedStudents.list',
        compact('students', 'search', 'totalStudents', 'perPage'));
}

public function Unadopted($id)
{
    // Find student
    $student = Student::findOrFail($id);

    // Update adopted fields
    $student->make_pledge = 0;
    $student->payment_approved = 0;
    $student->save();

    return redirect()->back()->with('success', 'Student marked as Unadopted successfully.');
}

}
