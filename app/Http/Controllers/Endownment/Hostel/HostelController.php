<?php

namespace App\Http\Controllers\Endownment\Hostel;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index($id)
    {
        $students = Student::find($id);

        return view('template.Hostel.index', compact('students'));
    }
}
