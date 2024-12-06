<?php

namespace App\Http\Controllers\Endownment\Student;

use App\Models\Domicile;
use App\Models\Province;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;

class StudentStoriesController extends Controller
{ 
    
    public function student_stories(Request $request)
{

    $disciplines = Discipline::all();
    $domiciles = Domicile::all();
    $provinces = Province::all();

    $gender = $request->input('gender');
    $province = $request->input('province');
    $discipline = $request->input('discipline');
    $degree = $request->input('degree');
    $domicile = $request->input('domicile'); // Add city filter

    $query = OpenfundStudent::query();

    if ($gender && $gender !== 'all') {
        $query->where('gender', $gender);
    }

    if ($province && $province !== 'all') {
        $query->where('province', $province);
    }

    if ($discipline && $discipline !== 'all') {
        $query->where('discipline', $discipline);
    }

    if ($degree && $degree !== 'all') {
        $query->where('degree', $degree);
    }

    if ($domicile && $domicile !== 'all') { // Add city condition
        $query->where('domicile', $domicile);
    }

    // Sort the query by monthly_income in ascending order
    $query->orderBy('monthly_income', 'asc');

    // Additional sorting logic if needed
    $query->orderByRaw("CASE WHEN images = 'dummy.png' THEN 1 ELSE 0 END, images");

    $students = $query->paginate(8);

    if ($request->ajax()) {
        $studentsHtml = view('template.support_scholar.partials.students', compact('students'))->render();
        $paginationHtml = view('template.support_scholar.partials.pagination', compact('students'))->render();
        return response()->json(['studentsHtml' => $studentsHtml, 'paginationHtml' => $paginationHtml]);
    }

    // Determine if pledge and payment are approved based on the first student in the collection
    $isPledgeApproved = $students->first()->make_pledge ?? 0;
    $isPaymentApproved = $students->first()->payment_approved ?? 0;

    return view('template.support_scholar.index', compact('students','disciplines', 'domiciles','provinces','isPledgeApproved', 'isPaymentApproved'));
}

public function student_stories_ind($id)
    {
        // $events = Event::all();
        $students = OpenfundStudent::find($id); // Use findOrFail to handle non-existent IDs gracefully

        // Access the make_pledge and payment_approved attributes with default value 0
        $isPledgeApproved = $students->make_pledge ?? 0;
        $isPaymentApproved = $students->payment_approved ?? 0;

        // dd($isPaymentApproved);

        return view('template.support_scholar.student_stories', compact('students', 'isPledgeApproved', 'isPaymentApproved'));
    }



  

}
