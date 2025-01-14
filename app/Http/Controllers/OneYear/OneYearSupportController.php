<?php

namespace App\Http\Controllers\OneYear;

use App\Models\School;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndowmentSupportOneYear;
use App\Models\CustomPackageOneYearDegree;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\DefaultPackageOneYearDegree;

class OneYearSupportController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $schools = School::all();
        $postgraduate= SupportADegreeForOneYearPg::all();
        $undergraduate= SupportADegreeForOneYearUg::all();
        return view('template.EndowmentModels.OneYear.OneYearEndoementFund', compact('countries','schools','postgraduate','undergraduate'));
    }


    public function DefultOneYearundergraduate(Request $request)
    {
        $defaultOneYearDegree = new DefaultPackageOneYearDegree();
    
        // Assign values from the request to the model properties
        $defaultOneYearDegree->program_type = $request->program_type;
        $defaultOneYearDegree->degree = $request->degree;
        $defaultOneYearDegree->seats = $request->seats ?? 1; // Default to 1 if not provided
        $defaultOneYearDegree->totalAmount = $request->totalAmount;
        $defaultOneYearDegree->donor_name = $request->donor_name;
        $defaultOneYearDegree->donor_email = $request->donor_email;
        $defaultOneYearDegree->phone = $request->phone;
        $defaultOneYearDegree->about_partner = $request->about_partner;
        $defaultOneYearDegree->philanthropist_text = $request->philanthropist_text;
        $defaultOneYearDegree->school = $request->school;
        $defaultOneYearDegree->country = $request->country;
        $defaultOneYearDegree->year = $request->year;
        $defaultOneYearDegree->payments_status = $request->payments_status;
    
        // Handle file upload for 'prove'
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
            $file->move(public_path('uploads/Oneyear-proof'), $filename); // Save the file in the public directory
            $defaultOneYearDegree->prove = $filename; // Save the same filename in the database
        }
    
        // Save the model to the database
        $defaultOneYearDegree->save();
    
        // Redirect to a success page or back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
    public function CustomOneYearundergraduate(Request $request)
    {
        $customOneYearDegree = new CustomPackageOneYearDegree();
    
        // Assign values from the request to the model properties
        $customOneYearDegree->program_type = $request->program_type;
        $customOneYearDegree->degree = $request->degree;
        $customOneYearDegree->seats = $request->seats ?? 1;
    
        // Ensure totalAmount is numeric
        $customOneYearDegree->totalAmount = preg_replace('/[^0-9.]/', '', $request->totalAmount);
    
        $customOneYearDegree->donor_name = $request->donor_name;
        $customOneYearDegree->donor_email = $request->donor_email;
        $customOneYearDegree->phone = $request->phone;
        $customOneYearDegree->about_partner = $request->about_partner;
        $customOneYearDegree->philanthropist_text = $request->philanthropist_text;
        $customOneYearDegree->school = $request->school;
        $customOneYearDegree->country = $request->country;
        $customOneYearDegree->year = $request->year;
        $customOneYearDegree->payments_status = $request->payments_status;
    
        // Handle file upload for 'prove'
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp to ensure uniqueness
            $file->move(public_path('uploads/Oneyear-proof'), $filename); // Save the file in the public directory
            $customOneYearDegree->prove = $filename; // Save the same filename in the database
        }
    
        // Save the model to the database
        $customOneYearDegree->save();
    
        // Redirect to a success page or back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
   
}
