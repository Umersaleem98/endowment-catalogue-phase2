<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportHostelProject;

class HostelProjectController extends Controller
{
    public function index()
    {
        return view('template.hostelproject.index');
    }

    public function PaymentIndex()
    {
        return view('template.hostelproject.payments');
    }
   
   public function PaymentDone(Request $request)
{

    // dd();
    $paymentsdone = new SupportHostelProject();
    $paymentsdone->donor_name   = $request->donor_name;
    $paymentsdone->donor_email  = $request->donor_email;
    $paymentsdone->country_code = $request->country_code;
    $paymentsdone->phone        = $request->phone;
    $paymentsdone->total_cost   = $request->total_cost;

    // Handle file upload
    if ($request->hasFile('prove')) {
        $fileName = time() . '.' . $request->prove->extension();
        $request->prove->move(public_path('uploads/projecthostel'), $fileName);

        $paymentsdone->prove = $fileName; // save filename in DB
    }

    $paymentsdone->save();

    return redirect()
        ->route('hostel.project.index')
        ->with('success', 'Thank you for supporting our hostel project!');
}


}
