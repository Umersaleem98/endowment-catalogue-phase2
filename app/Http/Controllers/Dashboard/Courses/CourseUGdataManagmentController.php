<?php

namespace App\Http\Controllers\Dashboard\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportADegreeForOneYearUg;

class CourseUGdataManagmentController extends Controller
{
    public function index()
    {
        $ugcourses = SupportADegreeForOneYearUg::all();
        return view('admin.UGCoursesManagment.list', compact('ugcourses'));
    }

    public function create()
    {
        return view('admin.UGCoursesManagment.create');
    }

    public function store(Request $request)
    {
        $ugcourses = new SupportADegreeForOneYearUg;
        $ugcourses->program = $request->program;
        $ugcourses->degree = $request->degree;
        $ugcourses->fee = $request->fee;
        $ugcourses->save();

        return back()->with('success', 'data is inserted successfully');

    }

    public function Edit($id)
    {

        $ugcourses = SupportADegreeForOneYearUg::find($id);
         return view('admin.UGCoursesManagment.edit', compact('ugcourses'));
        
    }

    public function Update(Request $request, $id)
{
    $ugcourses = SupportADegreeForOneYearUg::find($id);

    $ugcourses->update([
        'program' => $request->program,
        'degree'  => $request->degree,
        'fee'     => $request->fee,
    ]);

    return redirect()->route('ug.course.list')
                     ->with('success', 'Course updated successfully');
}



     public function delete($id)
{
    $ugcourses = SupportADegreeForOneYearUg::find($id);

    if ($ugcourses) {
        $ugcourses->delete();
        return redirect()->route('ug.course.list')
                         ->with('success', 'Data deleted successfully');
    }

    return redirect()->route('ug.course.list')
                     ->with('error', 'Record not found');
}

}
