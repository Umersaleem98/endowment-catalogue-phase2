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
    $validated = $request->validate([
        'donor_name'   => 'required|string|max:255',
        'donor_email'  => 'required|email|max:255',
        'country_code' => 'required|string|max:10',
        'phone'        => 'required|string|max:20',
        'total_cost'   => 'required|numeric',
        'prove'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('prove')) {
        $fileName = time() . '.' . $request->prove->extension(); // only filename.extension
        $request->prove->move(public_path('uploads/projecthostel'), $fileName);

        // save only filename in DB
        $validated['prove'] = $fileName;
    }

    SupportHostelProject::create($validated);

    return redirect()->route('hostel.project.index')->with('success', 'Thank you for supporting our hostel project!');
}

}
