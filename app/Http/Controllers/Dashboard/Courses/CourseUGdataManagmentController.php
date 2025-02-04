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

    public function delete($id)
    {
        $ugcourses = SupportADegreeForOneYearUg::find($id);
        $ugcourses->delete();
        return back()->with('success', 'data is delete successfully');

    }


}
