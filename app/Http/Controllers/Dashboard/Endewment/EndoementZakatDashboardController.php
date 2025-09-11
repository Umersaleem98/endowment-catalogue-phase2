<?php

namespace App\Http\Controllers\Dashboard\Endewment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndoementZakatPayment;

class EndoementZakatDashboardController extends Controller
{
    public function index()
    {
        $zakatpayment =EndoementZakatPayment::all();
        return view('admin.zakatpayment.list', compact('zakatpayment'));
    }

   public function Delete($id)
{
    $zakatpayment = EndoementZakatPayment::find($id);
    $zakatpayment->delete();

    return redirect()
        ->route('zakat.payments.list') // 👈 change this to your listing route name
        ->with('success', 'Zakat payment deleted successfully.');
}

}
