<?php

namespace App\Http\Controllers\Dashboard\StudentStory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentPledgePayment;
use App\Models\StudentsStoryPayments;

class DashboardStudentsStory extends Controller
{
    public function Payment_index()
    {
        $Payments =StudentsStoryPayments::all();
        
        return view('admin.StudentsStory.payments', compact('Payments'));
    }

    public function Pledge_index()
    {
        $pledge = StudentPledgePayment::all();
        return view('admin.StudentsStory.pledge', compact('pledge'));
    }
}
