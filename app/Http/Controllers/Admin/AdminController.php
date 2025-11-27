<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\HostelPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
{
    // Fetch total counts
    $totalStudents = Student::count();
    $ugStudents = Student::where('degree', 'UG')->count();
    $pgStudents = Student::where('degree', 'PG')->count();
    $adopedStudents = Student::where('make_pledge', 1)
        ->where('payment_approved', 1)
        ->count();

    // Group UG and PG students by year_of_admission
    $ugStudentsByYear = Student::selectRaw('year_of_admission, COUNT(*) as count')
        ->where('degree', 'UG')
        ->groupBy('year_of_admission')
        ->orderBy('year_of_admission', 'asc')
        ->pluck('count', 'year_of_admission');

    $pgStudentsByYear = Student::selectRaw('year_of_admission, COUNT(*) as count')
        ->where('degree', 'PG')
        ->groupBy('year_of_admission')
        ->orderBy('year_of_admission', 'asc')
        ->pluck('count', 'year_of_admission');

    $totalHostelPayments = HostelPayment::count();

    // All years combined for table display
    $allYears = array_unique(array_merge($ugStudentsByYear->keys()->toArray(), $pgStudentsByYear->keys()->toArray()));
    sort($allYears);

    return view('dashboard', compact(
        'totalStudents', 'ugStudents', 'pgStudents', 'adopedStudents',
        'ugStudentsByYear', 'pgStudentsByYear', 'totalHostelPayments', 'allYears'
    ));
}

}
