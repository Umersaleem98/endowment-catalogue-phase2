<?php

namespace App\Http\Controllers\Endownment\Four;

use App\Models\School;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\CustomPackageFourYearDegree;
use App\Models\DefaultPackageFourYearDegree;

class FourYearSupportController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $schools = School::all();
        $postgraduate= SupportADegreeForOneYearPg::all();
        $undergraduate= SupportADegreeForOneYearUg::all();
        return view('template.EndowmentModels.FourYear.FourYearEndoementFund', compact('countries','schools','postgraduate','undergraduate'));
    }

    public function DefultFourYearundergraduate(Request $request)
{
    $defaultfourYearDegree = new DefaultPackageFourYearDegree();

    // Assign values from the request to the model properties
    $defaultfourYearDegree->program_type = $request->program_type;
    $defaultfourYearDegree->degree = $request->degree;
    $defaultfourYearDegree->seats = $request->seats ?? 1; // Default to 1 if not provided
    $defaultfourYearDegree->totalAmount = $request->totalAmount;
    $defaultfourYearDegree->donor_name = $request->donor_name;
    $defaultfourYearDegree->donor_email = $request->donor_email;
    $defaultfourYearDegree->phone = $request->phone;
    $defaultfourYearDegree->about_partner = $request->about_partner;
    $defaultfourYearDegree->philanthropist_text = $request->philanthropist_text;
    $defaultfourYearDegree->school = $request->school;
    $defaultfourYearDegree->country = $request->country;
    $defaultfourYearDegree->year = $request->year;
    $defaultfourYearDegree->payments_status = $request->payments_status;

    // Handle file upload for 'prove'
    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
        $file->move(public_path('uploads/Fouryear-proof'), $filename); // Save file in the directory
        $defaultfourYearDegree->prove = $filename; // Save the file name in the database
    }

    // Save the model to the database
    $defaultfourYearDegree->save();

    // Redirect to a success page or back with a success message
    return redirect()->back()->with('success', 'Form submitted successfully!');
}


public function CustomFourYearundergraduate(Request $request)
{
    $customFourYearDegree = new CustomPackageFourYearDegree();

    // Assign values from the request to the model properties
    $customFourYearDegree->program_type = $request->program_type;
    $customFourYearDegree->degree = $request->degree;
    $customFourYearDegree->seats = $request->seats ?? 1;

    // Ensure totalAmount is numeric
    $customFourYearDegree->totalAmount = preg_replace('/[^0-9.]/', '', $request->totalAmount);

    $customFourYearDegree->donor_name = $request->donor_name;
    $customFourYearDegree->donor_email = $request->donor_email;
    $customFourYearDegree->phone = $request->phone;
    $customFourYearDegree->about_partner = $request->about_partner;
    $customFourYearDegree->philanthropist_text = $request->philanthropist_text;
    $customFourYearDegree->school = $request->school;
    $customFourYearDegree->country = $request->country;
    $customFourYearDegree->year = $request->year;
    $customFourYearDegree->payments_status = $request->payments_status;

    // Handle file upload for 'prove'
    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
        $file->move(public_path('uploads/Fouryear-proof'), $filename); // Save file in the directory
        $customFourYearDegree->prove = $filename; // Save the file name in the database
    }

    // Save the model to the database
    $customFourYearDegree->save();

    // Redirect to a success page or back with a success message
    return redirect()->back()->with('success', 'Form submitted successfully!');
}

    
}
