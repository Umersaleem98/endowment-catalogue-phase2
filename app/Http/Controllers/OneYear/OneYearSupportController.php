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
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;


class OneYearSupportController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $schools = School::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();
        return view('template.EndowmentModels.OneYear.OneYearEndoementFund', compact('countries', 'schools', 'postgraduate', 'undergraduate'));
    }

    public function DefultOneYearundergraduate(Request $request)
    {


        $attachmentPath = null;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('uploads/Oneyear-proof');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $attachmentPath = $destination . '/' . $filename;
        }



        // Save to database
        $defaultOneYearDegree = new DefaultPackageOneYearDegree();
        $defaultOneYearDegree->hostelandmessing = $request->hostelandmessing ?? 0;

        // dd( $defaultOneYearDegree->hostelandmessing = $request->hostelandmessing ?? 0);
        $defaultOneYearDegree->program_type = $request->program_type;
        $defaultOneYearDegree->degree = $request->degree;
        $defaultOneYearDegree->seats = $request->seats ?? 1;
        $defaultOneYearDegree->totalAmount = $request->totalAmount;
        $defaultOneYearDegree->donor_name = $request->donor_name;
        $defaultOneYearDegree->donor_email = $request->donor_email;
        $defaultOneYearDegree->phone = $request->phone;
        $defaultOneYearDegree->about_partner = $request->about_partner;
        $defaultOneYearDegree->philanthropist_text = $request->philanthropist_text ?? 0;
        $defaultOneYearDegree->school = $request->school ?? 0;
        $defaultOneYearDegree->country = $request->country ?? 0;
        $defaultOneYearDegree->year = $request->year ?? 0;
        $defaultOneYearDegree->payments_status = $request->payments_status;

        if ($attachmentPath) {
            $defaultOneYearDegree->prove = basename($attachmentPath);
        }

        $defaultOneYearDegree->save();

        // dd();
      return redirect()->route('select.endowmentmode')->with('success', 'Custom Package is submited successfully!');
    }



public function CustomOneYearundergraduate(Request $request)
{
    $students = SupportADegreeForOneYearPg::all();
    $schools = School::all();
    $countries = Country::all();
    $postgraduate = SupportADegreeForOneYearPg::all();
    $undergraduate = SupportADegreeForOneYearUg::all();

    $customOneYearDegree = new CustomPackageOneYearDegree();

    // Assign values from the request to the model properties
    $customOneYearDegree->program_type = $request->program_type;
    $customOneYearDegree->degree = $request->degree;
    $customOneYearDegree->seats = $request->seats ?? 1;
    $customOneYearDegree->totalAmount = preg_replace('/[^0-9.]/', '', $request->totalAmount);
    $customOneYearDegree->donor_name = $request->donor_name;
    $customOneYearDegree->donor_email = $request->donor_email;
    $customOneYearDegree->phone = $request->phone;
    $customOneYearDegree->about_partner = $request->about_partner;
    $customOneYearDegree->philanthropist_text = $request->philanthropist_text;
    $customOneYearDegree->school = $request->school ?? 0;
    $customOneYearDegree->country = $request->country ?? 0;
    $customOneYearDegree->year = $request->year ?? 0;
    $customOneYearDegree->payments_status = $request->payments_status;

    // File Upload
    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('uploads/Oneyear-proof');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $filename);

        // Save only filename in DB
        $customOneYearDegree->prove = $filename;
    }

    // Save the model to the database
    $customOneYearDegree->save();

    return redirect()->route('select.endowmentmode')->with('success', 'Custom Package is submitted successfully!');
}

}
