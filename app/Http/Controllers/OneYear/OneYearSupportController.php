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
        // // Define recipients
        // // $to = ["umer.saleem.abbasi109@gmail.com", "advancement@nust.edu.pk"];
        // $to = ["umer.saleem.abbasi109@gmail.com"];

        // // Add donor email if provided
        // if (!empty($request->donor_email)) {
        //     $to[] = $request->donor_email;
        // }

        // // Updated message
        // $msg = "Subject: Pending "
        //     . "Dear Valued Donor,\n\n"
        //     . "We sincerely appreciate your generous support for our scholarship program. Your commitment to empowering students through education is truly commendable.\n\n"
        //     . "We are pleased to inform you that your request for a One-Year Degree Sponsorship has been accepted. Our team will verify the details, and we will provide you with a confirmation soon.\n\n"
        //     . "Once again, we extend our heartfelt gratitude for your generosity and belief in our mission.\n\n"
        //     . "Best regards,\n"
        //     . "University Advancement Office"
        //     . "NUST Islamabad";


        // $subject = "abc";

        // Fetch data
        $students = SupportADegreeForOneYearPg::all();
        $schools = School::all();
        $countries = Country::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();

        // Handle file upload (do this BEFORE sending the email)
        // $attachmentPath = null;
        // if ($request->hasFile('prove')) {
        //     $file = $request->file('prove');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destination = public_path('uploads/Oneyear-proof');
        //     $file->move($destination, $filename);
        //     // Store full path for attachment
        //     $attachmentPath = $destination . '/' . $filename;
        // }

        // // Send email to multiple recipients including donor email
        // Mail::to($to)->send(new NotificationEmail(
        //     $msg,
        //     $subject,
        //     $students,
        //     $schools,
        //     $countries,
        //     $undergraduate,
        //     $postgraduate,
        //     $attachmentPath // pass the attachment path to the mailable
        // ));

        // Save form data
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
        $defaultOneYearDegree->philanthropist_text = $request->philanthropist_text?? 0;
        $defaultOneYearDegree->school = $request->school ?? 0;
        $defaultOneYearDegree->country = $request->country ?? 0;
        $defaultOneYearDegree->year = $request->year ?? 0;
        $defaultOneYearDegree->payments_status = $request->payments_status;

        // Save prove file name if uploaded
        // if ($attachmentPath) {
        //     $defaultOneYearDegree->prove = basename($attachmentPath);
        // }

        $defaultOneYearDegree->save();

        // dd($defaultOneYearDegree);
        return redirect()->back()->with('success', 'Form submitted successfully and email sent to donor!');
    }


    public function CustomOneYearundergraduate(Request $request)
    {
        // // $to = ["umer.saleem.abbasi109@gmail.com", "advancement@nust.edu.pk"];
        // $to = ["umer.saleem.abbasi109@gmail.com"];

        // // Add donor email if provided
        // if (!empty($request->donor_email)) {
        //     $to[] = $request->donor_email;
        // }

        // // Updated message
        // $msg = "Subject: Pending "
        //     . "Dear Valued Donor,\n\n"
        //     . "We sincerely appreciate your generous support for our scholarship program. Your commitment to empowering students through education is truly commendable.\n\n"
        //     . "We are pleased to inform you that your request for a One-Year Degree Sponsorship has been accepted. Our team will verify the details, and we will provide you with a confirmation soon.\n\n"
        //     . "Once again, we extend our heartfelt gratitude for your generosity and belief in our mission.\n\n"
        //     . "Best regards,\n"
        //     . "University Advancement Office"
        //     . "NUST Islamabad";


        // $subject = "Custom package one Year confirmation";

        // // Fetch data
        // $students = SupportADegreeForOneYearPg::all();
        // $schools = School::all();
        // $countries = Country::all();
        // $postgraduate = SupportADegreeForOneYearPg::all();
        // $undergraduate = SupportADegreeForOneYearUg::all();

        // // Handle file upload (do this BEFORE sending the email)
        // $attachmentPath = null;
        // if ($request->hasFile('prove')) {
        //     $file = $request->file('prove');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destination = public_path('uploads/Oneyear-proof');
        //     $file->move($destination, $filename);
        //     // Store full path for attachment
        //     $attachmentPath = $destination . '/' . $filename;
        // }

        // // Send email to multiple recipients including donor email
        // Mail::to($to)->send(new NotificationEmail(
        //     $msg,
        //     $subject,
        //     $students,
        //     $schools,
        //     $countries,
        //     $undergraduate,
        //     $postgraduate,
        //     $attachmentPath // pass the attachment path to the mailable
        // ));


        $students = SupportADegreeForOneYearPg::all();
        $schools = School::all();
        $countries = Country::all();
        $postgraduate = SupportADegreeForOneYearPg::all();
        $undergraduate = SupportADegreeForOneYearUg::all();


        // Mail::to($to)->send(new NotificationEmail($subject, $msg, $students, $schools, $countries, $postgraduate, $undergraduate));

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
        $customOneYearDegree->school = $request->school ?? 0;
        $customOneYearDegree->country = $request->country ?? 0;
        $customOneYearDegree->year = $request->year ?? 0;
        $customOneYearDegree->payments_status = $request->payments_status;

        // Handle file upload for 'prove'
       


        // if ($attachmentPath) {
        //     $customOneYearDegree->prove = basename($attachmentPath);
        // }

        // Save the model to the database
        $customOneYearDegree->save();
        // dd($customOneYearDegree);
        // Redirect to a success page or back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
