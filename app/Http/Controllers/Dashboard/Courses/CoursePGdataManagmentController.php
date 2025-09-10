<?php

namespace App\Http\Controllers\Dashboard\Courses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportADegreeForOneYearPg;

class CoursePGdataManagmentController extends Controller
{
    //SupportADegreeForOneYearPg

    public function index()
    {
        $pgcourses = SupportADegreeForOneYearPg::all();
        return view('admin.PGCoursesManagement.list', compact('pgcourses'));
    }

    public function create()
    {
        return view('admin.PGCoursesManagement.create');
    }

    public function store(Request $request)
    {
        $ugcourses = new SupportADegreeForOneYearPg;
        $ugcourses->program = $request->program;
        $ugcourses->degree = $request->degree;
        $ugcourses->fee = $request->fee;
        $ugcourses->save();

        return back()->with('success', 'data is inserted successfully');

    }


    public function EditPG($id)
    {


        $pgcourses = SupportADegreeForOneYearPg::find($id);
         return view('admin.PGCoursesManagement.edit', compact('pgcourses'));
        
    }

    public function UpdatePG(Request $request, $id)
{
    $pgcourses = SupportADegreeForOneYearPg::find($id);

    $pgcourses->update([
        'program' => $request->program,
        'degree'  => $request->degree,
        'fee'     => $request->fee,
    ]);

    return redirect()->route('pg.course.list')
                     ->with('success', 'Course updated successfully');
}



    public function delete($id)
{
    $ugcourses = SupportADegreeForOneYearPg::find($id);

    if ($ugcourses) {
        $ugcourses->delete();
    }

    return redirect()->route('ug.course.list')
                     ->with('success', 'Data deleted successfully');
}

}
