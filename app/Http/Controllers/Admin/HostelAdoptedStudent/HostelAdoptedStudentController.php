<?php

namespace App\Http\Controllers\Admin\HostelAdoptedStudent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostelAdoptedStudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10); // default 10

    $studentsQuery = Student::query()
        ->where('hostel_status', 1);   // show only adopted students

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

    return view('pages.admin.HostelAdoptedStudents.list',
        compact('students', 'search', 'totalStudents', 'perPage'));
}

public function Unadopted($id)
{
    // Find student
    $student = Student::findOrFail($id);

    // Update adopted fields
    $student->hostel_status = 0;
    $student->save();

    return redirect()->back()->with('success', 'Student marked as Unadopted successfully.');
}
}
