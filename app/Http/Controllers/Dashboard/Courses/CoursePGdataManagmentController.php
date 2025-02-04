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

    public function delete($id)
    {
        $ugcourses = SupportADegreeForOneYearPg::find($id);
        $ugcourses->delete();
        return back()->with('success', 'data is delete successfully');

    }

}
