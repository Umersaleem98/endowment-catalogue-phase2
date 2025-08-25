<?php

namespace App\Http\Controllers\Endownment\PerpetualSeat;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CustomPackageFourYearDegree;
use App\Models\CustomPackagePerpetualSeatDegree;
use App\Models\DefaultPackageFourYearDegree;
use App\Models\DefultPackagePerpetualSeatDegree;
use App\Models\School;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;

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

        // Fetch data
        $students = SupportADegreeForOneYearPg::all();
        $schools = School::all();
        $countries = Country::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();

        // Handle file upload (do this BEFORE sending the email)
        $attachmentPath = null;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('uploads/perpetualseat-proof');
            $file->move($destination, $filename);
            // Store full path for attachment
            $attachmentPath = $destination . '/' . $filename;
        }

     
        $defaultPerpetualSeat = new DefultPackagePerpetualSeatDegree();
    
        // Assign values from the request to the model properties
        $defaultPerpetualSeat->hostelandmessing = $request->hostelandmessing ?? 0;
        $defaultPerpetualSeat->program_type = $request->program_type;
        $defaultPerpetualSeat->degree = $request->degree;
        $defaultPerpetualSeat->seats = $request->seats ?? 1; // Default to 1 if not provided
    
        // Ensure totalAmount is numeric
        $defaultPerpetualSeat->totalAmount = preg_replace('/[^0-9.]/', '', $request->totalAmount);
    
        $defaultPerpetualSeat->donor_name = $request->donor_name;
        $defaultPerpetualSeat->donor_email = $request->donor_email;
        $defaultPerpetualSeat->phone = $request->phone;
        $defaultPerpetualSeat->about_partner = $request->about_partner;
        $defaultPerpetualSeat->philanthropist_text = $request->philanthropist_text;
        $defaultPerpetualSeat->school = $request->school;
        $defaultPerpetualSeat->country = $request->country;
        $defaultPerpetualSeat->year = $request->year;
        $defaultPerpetualSeat->payments_status = $request->payments_status;
    
        

        if ($attachmentPath) {
            $defaultPerpetualSeat->prove = basename($attachmentPath);
        }

        // Save the model to the database
        $defaultPerpetualSeat->save();
    
        // Redirect to a success page or back with a success message
    return redirect()->route('select.endowmentmode')->with('success', 'Custom Package is submitted successfully!');
    }
    

    public function CustomPerpetualSeatundergraduate(Request $request)
    {

       

        // Fetch data
        $students = SupportADegreeForOneYearPg::all();
        $schools = School::all();
        $countries = Country::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();

        // Handle file upload (do this BEFORE sending the email)
        $attachmentPath = null;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('uploads/perpetualseat-proof');
            $file->move($destination, $filename);
            // Store full path for attachment
            $attachmentPath = $destination . '/' . $filename;
        }

    
        $customPerpetualSeat = new CustomPackagePerpetualSeatDegree();
    
        // Assign values from the request to the model properties
        $customPerpetualSeat->program = $request->program;
        $customPerpetualSeat->endowment_type = $request->endowment_type; // Fixed typo
        $customPerpetualSeat->degree = $request->degree;
        $customPerpetualSeat->seats = $request->seats ?? 1; // Default to 1 if not provided
    
        // Ensure totalAmount is numeric
        $customPerpetualSeat->totalAmount = preg_replace('/[^0-9.]/', '', $request->totalAmount);
    
        $customPerpetualSeat->donor_name = $request->donor_name;
        $customPerpetualSeat->donor_email = $request->donor_email;
        $customPerpetualSeat->phone = $request->phone;
        $customPerpetualSeat->about_partner = $request->about_partner;
        $customPerpetualSeat->philanthropist_text = $request->philanthropist_text;
        $customPerpetualSeat->school = $request->school;
        $customPerpetualSeat->country = $request->country;
        $customPerpetualSeat->year = $request->year;
        $customPerpetualSeat->payments_status = $request->payments_status;
    
        if ($attachmentPath) {
            $customPerpetualSeat->prove = basename($attachmentPath);
        }
        // Save the model to the database
        $customPerpetualSeat->save();
    
        // Redirect to a success page or back with a success message
    return redirect()->route('select.endowmentmode')->with('success', 'Custom Package is submitted successfully!');
    }
    
}
