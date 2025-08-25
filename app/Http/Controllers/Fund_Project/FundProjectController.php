<?php

namespace App\Http\Controllers\Fund_Project;

use App\Models\FundAProject;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;

class FundProjectController extends Controller
{
    public function index()
    {
        $project_categories = ProjectCategory::all();
        return view('template.fund_project.select_project', compact('project_categories'));
    }

    public function FundProject($id)
    {
        $project_categories = ProjectCategory::find($id);

        return view('template.fund_project.fund_screen', compact('project_categories'));
    }


    public function payment_fund_a_project($id)
    {
        $project_categories = ProjectCategory::find($id);
        return view('template.fund_project.payment_fund_a_project', compact('project_categories'));
    }


    public function payment_fund_a_project_store(Request $request)
    {
        $payments = new FundAProject;
        $payments->project_name = $request->project_name;
        $payments->donor_name = $request->donor_name;
        $payments->donor_email = $request->donor_email;
        $payments->phone = $request->phone;
        $payments->amount_for = $request->amount_for;
        $payments->amount = $request->amount;

        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/fundaprojects_payments-proof'), $filename);
            $payments->prove = 'uploads/fundaprojects_payments-proof/' . $filename;
        }
           

        $payments->save();
        // return redirect()->back()->with('success', 'Payment successfully made.');
        return rediect()->route('')->with('success', 'Payment successfully made.');
    }
}
