<?php

namespace App\Http\Controllers\Endownment\Zakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndoementZakatPayment;

class ZakatController extends Controller
{
    public function index()
    {
        return view('template.EndowmentModels.Zakatfund.index');
    }
   
    public function zakatPayment()
    {
        return view('template.EndowmentModels.Zakatfund.payments');
    }


    public function payments(Request $request)
    {
        $zakatpayments = new EndoementZakatPayment();
    
        $zakatpayments->payment_type = $request->payment_type;
        $zakatpayments->donor_name = $request->donor_name;
        $zakatpayments->donor_email = $request->donor_email ?? 1;
        $zakatpayments->phone = $request->phone;
        $zakatpayments->duration = $request->duration;
        $zakatpayments->amount = $request->amount;
        
        // Ensure totalAmount is numeric
       
    
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
            $file->move(public_path('uploads/zakatpayments-proof'), $filename); // Save file in the directory
            $zakatpayments->prove = $filename; // Save the file name in the database
        }
    
        $zakatpayments->save();
    
        // dd( $zakatpayments->save());
        return redirect()->route('endowment.zakat.funds')->with('success', 'Form submitted successfully!');
    }
}
