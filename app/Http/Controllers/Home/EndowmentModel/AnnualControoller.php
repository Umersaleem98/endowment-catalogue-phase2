<?php

namespace App\Http\Controllers\Home\EndowmentModel;

use App\Models\School;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomPackageOneYearDegree;
use App\Models\SupportADegreeForOneYearPg;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\DefaultPackageOneYearDegree;

class AnnualControoller extends Controller
{
        public function index()
    {
        $countries = Country::all();
        $schools = School::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();
        return view('pages.Home.EndowmentModels.Annual.OneYearEndoementFund', compact('countries', 'schools', 'postgraduate', 'undergraduate'));
    }

  public function DefultOneYearundergraduate(Request $request)
{
    // Validate file
    $request->validate([
        'prove' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
    ]);

    $attachmentPath = null;

    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('uploads/annual-proof');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);
        $attachmentPath = $destination . '/' . $filename;
    }

    // Save to database
    $defaultOneYearDegree = new DefaultPackageOneYearDegree();
    $defaultOneYearDegree->hostelandmessing = $request->hostelandmessing ?? 0;
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

    return redirect()->route('select.endowmentmode')
                     ->with('success', 'Custom Package is submitted successfully!');
}




public function CustomOneYearundergraduate(Request $request)
{
    // Validation - only images now
    $request->validate([
        'prove' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
    ]);

    $customOneYearDegree = new CustomPackageOneYearDegree();

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

    // Always set payments_status to 0
    $customOneYearDegree->payments_status = 0;

    // File Upload
    $uploadedFileName = null;
    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('uploads/annual-proof');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        $customOneYearDegree->prove = $filename;
        $uploadedFileName = $filename;
    }

    // Save to database
    $customOneYearDegree->save();

    // Redirect back with success message AND filename to display image on top
    return redirect()->route('select.endowmentmode')
                     ->with('success', 'Custom Package is submitted successfully!')
                     ->with('prove_image', $uploadedFileName);
}


}
