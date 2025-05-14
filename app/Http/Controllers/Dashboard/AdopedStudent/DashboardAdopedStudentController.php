<?php

namespace App\Http\Controllers\Dashboard\AdopedStudent;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdopedStudentController extends Controller
{
    public function index()
{
    $adopedstudents = Student::where('payment_approved', 1)
                              ->orWhere('make_pledge', 1)
                              ->get();

    return view('admin.AdopedStudent.list', compact('adopedstudents'));
}

}
