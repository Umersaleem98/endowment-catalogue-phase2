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

public function ZakatbulkDelete(Request $request)
{
    $ids = explode(',', $request->ids);

    if (!empty($ids)) {
        EndoementZakatPayment::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Selected records deleted successfully!');
    }

    return redirect()->back()->with('success', 'No records selected for deletion.');
}


}
