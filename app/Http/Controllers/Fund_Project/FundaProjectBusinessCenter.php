<?php

namespace App\Http\Controllers\Fund_Project;

use Illuminate\Http\Request;
use App\Models\BusinessCenter;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;

class FundaProjectBusinessCenter extends Controller
{
    public function index($id)
    {
        $projectcategory = ProjectCategory::find($id);
        return view('template.fund_project.BusinessCenter.index', compact('projectcategory'));
    }

    public function store(Request $request)
    {
        $business_center = new BusinessCenter;
        $business_center->description = $request->description;
        $business_center->area_sft = $request->area_sft;
        $business_center->quantity = $request->quantity;
        $business_center->total_area_sft = $request->total_area_sft;
        $business_center->construction_cost = $request->construction_cost;
        $business_center->total_project_cost = $request->total_project_cost;
        $business_center->total_in_million = $request->total_in_million;
        $business_center->project_name = $request->project_name;
        $business_center->donor_name = $request->donor_name;
        $business_center->donor_email = $request->donor_email;
        $business_center->donor_phone = $request->donor_phone;
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/fundaprojects_paymentsbusiness_center_store-proof'), $filename);
            $business_center->prove = 'uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $filename;
        }
        $business_center->save();

        return redirect()->back()->with('success', 'Hostel boys data stored successfully!');

    }
}
