<?php

namespace App\Http\Controllers\Home\EndowmentModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndoementZakatPayment;

class ZakatFundController extends Controller
{
    public function index()
    {
        return view('pages.Home.EndowmentModels.Zakatfund.index');
    }
   
    public function zakatPayment()
    {
        return view('pages.Home.EndowmentModels.Zakatfund.payments');
    }


    public function payments(Request $request)
{
    // Validate input
    $request->validate([
        'payment_type' => 'required',
        'donor_name'   => 'required|string|max:255',
        'donor_email'  => 'required|email',
        'phone'        => 'required|string|max:20',
        'duration'     => 'required',
        'amount'       => 'required|numeric',
        'prove'        => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // File upload
    $proveName = null;

    if ($request->hasFile('prove')) {
        $file = $request->file('prove');
        $proveName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/zakat-payments'), $proveName);
    }

    // Save to database
    EndoementZakatPayment::create([
        'payment_type' => $request->payment_type,
        'donor_name'   => $request->donor_name,
        'donor_email'  => $request->donor_email,
        'phone'        => $request->phone,
        'duration'     => $request->duration,
        'amount'       => $request->amount,
        'prove'        => $proveName,
    ]);

    return redirect()->back()->with('success', 'Payment submitted successfully!');
}

}
