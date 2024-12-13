<?php

namespace App\Http\Controllers\Endownment\PerpetualSeat;

use App\Models\School;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\CustomPackageFourYearDegree;
use App\Models\DefaultPackageFourYearDegree;
use App\Models\CustomPackagePerpetualSeatDegree;
use App\Models\DefultPackagePerpetualSeatDegree;

class PerpetualSeatSupportController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $schools = School::all();
        $postgraduate= SupportADegreeForOneYearPg::all();
        $undergraduate= SupportADegreeForOneYearUg::all();
        return view('template.EndowmentModels.PerpetualSeat.perpetual_seat_package', compact('countries','schools','postgraduate','undergraduate'));
    }

    public function DefultPerpetualSeatundergraduate(Request $request)
    {
        $defaultfourYearDegree = new DefultPackagePerpetualSeatDegree();

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
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/Fouryear-proof'), $filename);
            $defaultfourYearDegree->prove = 'uploads/proofs/' . $filename;
        }

        // Save the model to the database
        $defaultfourYearDegree->save();

        // Redirect to a success page or back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    
    }


    public function CustomPerpetualSeatundergraduate(Request $request)
    {
        $customFourYearDegree = new CustomPackagePerpetualSeatDegree();
    
        $customFourYearDegree->program = $request->program;
        $customFourYearDegree->endoement_type = $request->endoement_type;
        $customFourYearDegree->degree = $request->degree;
        $customFourYearDegree->seats = $request->seats ?? 1;
        $customFourYearDegree->degree = $request->degree;
    
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
    
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/perpetualseat-proof'), $filename);
            $customFourYearDegree->prove = 'uploads/perpetualseat-proof/' . $filename;
        }
    
        $customFourYearDegree->save();
    
        // dd( $customFourYearDegree->save());
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
