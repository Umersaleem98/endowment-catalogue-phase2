<?php 

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Pages\TeamController;
use App\Http\Controllers\HostelProjectController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/ourteam', [TeamController::class, 'index'])->name('our.team');
// Route::get('/meetoutteam/{id}', [TeamController::class, 'About_team'])->name('');
Route::get('/rmo', [ResourceMobilizationOfficerController::class, 'index'])->name('r.m.o');
Route::get('/signrature/program', [SignatureProgramController::class, 'index'])->name('signrature.program');
Route::get('/nust/trust/foundation', [NustTrustFundController::class, 'index'])->name('nust.trust.foundation');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');


// Endoenment Model routes and controllers 

Route::get('/select/endowmentmodel', [EndowmentHomeController::class, 'index'])->name('select.endowmentmode');
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
Route::get('endowment/zakat/funds', [ZakatController::class, 'index'])->name('endowment.zakat.funds');
Route::get('endowment/zakat/payment', [ZakatController::class, 'zakatPayment'])->name('endowment.zakat.payment.index');
Route::post('endowment/zakat/payment', [ZakatController::class, 'payments'])->name('endowment.zakat.payment');
// Students stories routes and controllers 

Route::get('student/stories', [StudentStoriesController::class, 'student_stories'])->name('student.stories');
Route::get('student/stories/indiviual/{id}', [StudentStoriesController::class, 'student_stories_ind'])->name('student.stories.indiviual');
Route::get('payment/{id}', [StudentStoriesController::class, 'payment_index'])->name('payment.stories.index');
Route::get('Make_a_Pledge/{id}', [StudentStoriesController::class, 'Make_a_Pledge'])->name('Make.a.Pledge');
// Route::post('payments/{id}', [StudentStoriesController::class, 'paymentsstore']);
Route::post('/payments/{id}', [StudentStoriesController::class, 'store'])->name('stories.payments.store');
Route::post('/pledge/payment/{id}', [StudentStoriesController::class, 'pledgestore'])->name('pledge.payment.store');

// hostel Controller templates 
Route::get('/students/hostel/{id}', [HostelController::class, 'index'])->name('students.hostel');
// Route::get('/students/hostel/{id}', [StudentController::class, 'viewHostel'])->name('students.hostel');
Route::post('/hostel-payments/{id}', [HostelController::class, 'store']);

// Route::post('/hostel-payments', [HostelController::class, 'store']);

// Other Projects routes and controllers 

Route::get('select/project', [FundProjectController::class, 'index'])->name('select.project');
Route::get('fund_project/{id}', [FundProjectController::class, 'FundProject']);
Route::get('payments_project/{id}', [FundProjectController::class, 'payment_fund_a_project']);
Route::post('fund_a_project', [FundProjectController::class, 'payment_fund_a_project_store']);

Route::get('boyshostel/{id}', [FundaProjectBoysHostel::class, 'index']);
Route::post('boys/hostel/store', [FundaProjectBoysHostel::class, 'store'])->name('boys.hostel.store');

Route::get('girlshostel/{id}', [FundaProjectgirlsHostel::class, 'index']);
Route::post('girls/hostel/store', [FundaProjectgirlsHostel::class, 'store'])->name('girls.hostel.store');

Route::get('mosque/{id}', [FundaProjectMosque::class, 'index']);
Route::post('mosque/store', [FundaProjectMosque::class, 'store'])->name('mosque.store');

Route::get('business_center/{id}', [FundaProjectBusinessCenter::class, 'index']);
Route::post('business/center/store', [FundaProjectBusinessCenter::class, 'store'])->name('business.center.store');

Route::get('hostel/project/index', [HostelProjectController::class, 'index'])->name('hostel.project.index');
Route::get('hostel/project/payments', [HostelProjectController::class, 'PaymentIndex'])->name('hostel.project.payments');
Route::post('hostel/project/payments', [HostelProjectController::class, 'PaymentDone'])->name('hostel.project.done');

