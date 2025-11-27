<?php

namespace App\Http\Controllers\Home\Hostel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportHostelProject;

class SupportHostelController extends Controller
{
     public function index()
    {
        return view('pages.Home.Hostelpro.index');
    }
   
    public function Payments()
    {
        return view('pages.Home.Hostelpro.payments');
    }


    public function store(Request $request)
{
    // Validate Inputs
    $validated = $request->validate([
        'donor_name'   => 'required|string|max:255',
        'donor_email'  => 'required|email|max:255',
        'country_code' => 'required|string|max:10',
        'phone'        => 'required|string|max:20',
        'total_cost'   => 'required|numeric',
        'prove'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Handle File Upload (if exists)
    $proveFileName = null;
    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $proveFileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('Uploads/hostel_proofs'), $proveFileName);
    }

    // Save Data
    SupportHostelProject::create([
        'donor_name'   => $validated['donor_name'],
        'donor_email'  => $validated['donor_email'],
        'country_code' => $validated['country_code'],
        'phone'        => $validated['phone'],
        'total_cost'   => $validated['total_cost'],
        'prove'        => $proveFileName,
    ]);

    return redirect()->route('hostel.project.index')->with('success', 'Your support has been submitted successfully!');
}
}
