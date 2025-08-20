<?php 

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Pages\TeamController;
use App\Http\Controllers\Pages\AboutUsController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\NustTrustFundController;
use App\Http\Controllers\Fund_Project\FundaProjectMosque;
use App\Http\Controllers\Endownment\Zakat\ZakatController;
use App\Http\Controllers\OneYear\OneYearSupportController;
use App\Http\Controllers\Pages\SignatureProgramController;
use App\Http\Controllers\Endownment\EndowmentHomeController;
use App\Http\Controllers\Endownment\Hostel\HostelController;
use App\Http\Controllers\Fund_Project\FundProjectController;
use App\Http\Controllers\Fund_Project\FundaProjectBoysHostel;
use App\Http\Controllers\Fund_Project\FundaProjectgirlsHostel;
use App\Http\Controllers\Fund_Project\FundaProjectBusinessCenter;
use App\Http\Controllers\Endownment\Four\FourYearSupportController;
use App\Http\Controllers\Endownment\Student\StudentStoriesController;
use App\Http\Controllers\Pages\ResourceMobilizationOfficerController;
use App\Http\Controllers\Endownment\PerpetualSeat\PerpetualSeatSupportController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/our_team', [TeamController::class, 'index']);
Route::get('/meet_out_team/{id}', [TeamController::class, 'About_team']);
Route::get('/r_m_o', [ResourceMobilizationOfficerController::class, 'index']);
Route::get('/signrature_program', [SignatureProgramController::class, 'index']);
Route::get('/nust_trust_foundation', [NustTrustFundController::class, 'index']);
Route::get('/about_us', [AboutUsController::class, 'index']);
Route::get('/contact_us', [ContactUsController::class, 'index']);


// Endoenment Model routes and controllers 

Route::get('/select_endowment_model', [EndowmentHomeController::class, 'index']);
// One Year support endoement fund routes and controllers 
Route::get('support/for/one/year', [OneYearSupportController::class, 'index'])->name('index.support.for.one.year');
Route::post('default/one/year/degree', [OneYearSupportController::class, 'DefultOneYearundergraduate'])->name('support.for.one.year');
Route::post('endowment/support/oneyear', [OneYearSupportController::class, 'CustomOneYearundergraduate'])->name('custom.endowment.supportone.year');
// One Year support endoement fund routes and controllers 
Route::get('support/for/entire/year', [FourYearSupportController::class, 'index'])->name('index.support.for.entire.year');

Route::post('default/package/full/degree', [FourYearSupportController::class, 'DefultFourYearundergraduate'])->name('support.for.entire.year');
Route::post('endowment/support/entire/year', [FourYearSupportController::class, 'CustomFourYearundergraduate'])->name('custom.endowment.support.entire.year');
// perpetual_seat support endoement fund routes and controllers 
Route::get('perpetual/seat/yourname', [PerpetualSeatSupportController::class, 'index'])->name('index.perpetual.seat');
Route::post('default/perpetual/seat', [PerpetualSeatSupportController::class, 'DefultPerpetualSeatundergraduate'])->name('default.perpetual.seat');
Route::post('perpetual/seat/yourname', [PerpetualSeatSupportController::class, 'CustomPerpetualSeatundergraduate'])->name('custom.perpetual.seat.yourname');
// Zakat fund routes and controllers 
Route::get('endowment_zakat_funds', [ZakatController::class, 'index']);
Route::get('endowment_zakat_payment', [ZakatController::class, 'zakatPayment']);
Route::post('endowment_zakat_payment', [ZakatController::class, 'payments']);
// Students stories routes and controllers 

Route::get('student_stories', [StudentStoriesController::class, 'student_stories']);
Route::get('student_stories_indiviual/{id}', [StudentStoriesController::class, 'student_stories_ind']);
Route::get('payment/{id}', [StudentStoriesController::class, 'payment_index']);
Route::get('Make_a_Pledge/{id}', [StudentStoriesController::class, 'Make_a_Pledge']);
// Route::post('payments/{id}', [StudentStoriesController::class, 'paymentsstore']);
Route::post('/payments/{id}', [StudentStoriesController::class, 'store']);
Route::post('/pledge_payment/{id}', [StudentStoriesController::class, 'pledgestore'])->name('pledge_payment.store');

// hostel Controller templates 
Route::get('/students/hostel/{id}', [HostelController::class, 'index'])->name('students.hostel');
// Route::get('/students/hostel/{id}', [StudentController::class, 'viewHostel'])->name('students.hostel');
Route::post('/hostel-payments/{id}', [HostelController::class, 'store']);

// Route::post('/hostel-payments', [HostelController::class, 'store']);

// Other Projects routes and controllers 

Route::get('select_project', [FundProjectController::class, 'index']);
Route::get('fund_project/{id}', [FundProjectController::class, 'FundProject']);
Route::get('payments_project/{id}', [FundProjectController::class, 'payment_fund_a_project']);
Route::post('fund_a_project', [FundProjectController::class, 'payment_fund_a_project_store']);

Route::get('boyshostel/{id}', [FundaProjectBoysHostel::class, 'index']);
Route::post('boys_hostel_store', [FundaProjectBoysHostel::class, 'store']);

Route::get('girlshostel/{id}', [FundaProjectgirlsHostel::class, 'index']);
Route::post('girls_hostel_store', [FundaProjectgirlsHostel::class, 'store']);

Route::get('mosque/{id}', [FundaProjectMosque::class, 'index']);
Route::post('mosque_store', [FundaProjectMosque::class, 'store']);

Route::get('business_center/{id}', [FundaProjectBusinessCenter::class, 'index']);
Route::post('business_center_store', [FundaProjectBusinessCenter::class, 'store']);
