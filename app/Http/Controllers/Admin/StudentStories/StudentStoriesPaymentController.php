<?php

namespace App\Http\Controllers\Admin\StudentStories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentPledgePayment;
use App\Models\StudentsStoryPayments;

class StudentStoriesPaymentController extends Controller
{
   public function payment_index(Request $request)
{
    $perPage = $request->input('perPage', 10);
    $search = $request->input('search');

    $query = StudentsStoryPayments::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('student_name', 'like', "%{$search}%")
              ->orWhere('donor_name', 'like', "%{$search}%")
              ->orWhere('donor_email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");
        });
    }

    $stories_payment = $query->paginate($perPage);

    return view('pages.admin.StudentStoriesPayments.payment.list', compact('stories_payment'));
}



   public function pledge_index(Request $request)
{
    $perPage = $request->input('perPage', 10);
    $search = $request->input('search');

    $query = StudentPledgePayment::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('student_name', 'like', "%{$search}%")
              ->orWhere('donor_name', 'like', "%{$search}%");
        });
    }

    $stories_pledge = $query->paginate($perPage);

    return view('pages.admin.StudentStoriesPayments.pledge.list', compact('stories_pledge'));
}

}
