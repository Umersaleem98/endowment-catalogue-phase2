<?php

namespace App\Http\Controllers\Dashboard\Hostel;

use App\Http\Controllers\Controller;
use App\Models\HostelPayment;
use Illuminate\Http\Request;

class DashboardHostelController extends Controller
{
    public function index()
    {
        $hostelpayments = HostelPayment::all();
        return view('admin.Hostel.list', compact('hostelpayments'));
    }

    public function delete($id)
    {
        $hostelpayments = HostelPayment::find($id);
        $hostelpayments->delete();

        return back()->with('success', 'the Payemnts of Hostel delete successfully');
    }
}
