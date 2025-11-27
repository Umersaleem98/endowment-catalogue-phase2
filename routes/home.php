<?php 

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\Home\HomeController;
use App\Http\Controllers\Home\Pages\TeamController;
use App\Http\Controllers\Home\Pages\AboutUsController;
use App\Http\Controllers\Home\Pages\ContactUsController;
use App\Http\Controllers\Home\Pages\NustTrustFundController;
use App\Http\Controllers\Home\Hostel\SupportHostelController;
use App\Http\Controllers\Home\EndowmentModel\AnnualControoller;
use App\Http\Controllers\Home\Pages\SignatureProgramController;
use App\Http\Controllers\Home\EndowmentModel\ZakatFundController;
use App\Http\Controllers\Home\FundProjects\FundProjectController;
use App\Http\Controllers\Home\EndowmentModel\FulldegreeController;
use App\Http\Controllers\Home\EndowmentModel\EndowmentHomeController;
use App\Http\Controllers\Home\FundProjects\Mosque\FundaProjectMosque;
use App\Http\Controllers\Home\StudentStories\StudentStoriesController;
use App\Http\Controllers\Home\Pages\ResourceMobilizationOfficerController;
use App\Http\Controllers\Home\EndowmentModel\PerpetualSeatSupportController;
use App\Http\Controllers\Home\FundProjects\BoysHostel\FundaProjectBoysHostel;
use App\Http\Controllers\Home\FundProjects\Business\FundaProjectBusinessCenter;
use App\Http\Controllers\Home\FundProjects\GirlsHostel\FundaProjectgirlsHostel;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/ourteam', [TeamController::class, 'index'])->name('our.team');
Route::get('/rmo', [ResourceMobilizationOfficerController::class, 'index'])->name('r.m.o');
Route::get('/signrature/program', [SignatureProgramController::class, 'index'])->name('signrature.program');
Route::get('/nust/trust/foundation', [NustTrustFundController::class, 'index'])->name('nust.trust.foundation');
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');

Route::get('/select/endowmentmodel', [EndowmentHomeController::class, 'index'])->name('select.endowmentmode');

Route::get('Annual/support/endowment', [AnnualControoller::class, 'index'])->name('annual.support.index');
Route::post('default/Annual/support/endowment', [AnnualControoller::class, 'DefultOneYearundergraduate'])->name('defult.annual.support.store');
Route::post('custom/Annual/support/endowment', [AnnualControoller::class, 'CustomOneYearundergraduate'])->name('custom.annual.support.store');


Route::get('fulldegree/support/endowment', [FulldegreeController::class, 'index'])->name('index.support.fulldegree');
Route::post('default/fulldegree/support/endowment', [FulldegreeController::class, 'DefultFourYearundergraduate'])->name('defult.fulldegree.support.store');
Route::post('custom/fulldegree/support/endowment', [FulldegreeController::class, 'CustomFourYearundergraduate'])->name('custom.fulldegree.support.store');

Route::get('perpetual/seat/yourname', [PerpetualSeatSupportController::class, 'index'])->name('index.perpetual.seat');
Route::post('default/perpetual/seat', [PerpetualSeatSupportController::class, 'DefultPerpetualSeatundergraduate'])->name('default.perpetual.seat.store');


Route::get('endowment/zakat/funds', [ZakatFundController::class, 'index'])->name('endowment.zakat.funds');
Route::get('endowment/zakat/payment', [ZakatFundController::class, 'zakatPayment'])->name('endowment.zakat.payment.index');
Route::post('endowment/zakat/payment', [ZakatFundController::class, 'payments'])->name('endowment.zakat.payment');

Route::get('student/stories', [StudentStoriesController::class, 'student_stories'])->name('student.stories');
Route::get('student/stories/indiviual/{id}', [StudentStoriesController::class, 'student_stories_ind'])->name('student.stories.individual');
Route::get('payment/{id}', [StudentStoriesController::class, 'payment_index'])->name('payment.stories.index');
Route::get('Make_a_Pledge/{id}', [StudentStoriesController::class, 'Make_a_Pledge'])->name('Make.a.Pledge');
Route::post('/payments/{id}', [StudentStoriesController::class, 'store'])->name('stories.payments.store');
Route::post('/pledge/payment/{id}', [StudentStoriesController::class, 'pledgestore'])->name('pledge.payment.store');


Route::get('select/project', [FundProjectController::class, 'index'])->name('select.project');
// Route::get('fund_project/{id}', [FundProjectController::class, 'FundProject']);
// Route::get('payments_project/{id}', [FundProjectController::class, 'payment_fund_a_project']);
// Route::post('fund_a_project', [FundProjectController::class, 'payment_fund_a_project_store']);

Route::get('boys/hostel', [FundaProjectBoysHostel::class, 'index'])->name('boys.hostel.index');
Route::post('boys/hostel/store', [FundaProjectBoysHostel::class, 'store'])->name('boys.hostel.store');

Route::get('girls/hostel', [FundaProjectgirlsHostel::class, 'index'])->name('girls.hostel.index');
Route::post('girls/hostel/store', [FundaProjectgirlsHostel::class, 'store'])->name('girls.hostel.store');

Route::get('mosque/index', [FundaProjectMosque::class, 'index'])->name('mosque.project.index');
Route::post('mosque/store', [FundaProjectMosque::class, 'store'])->name('mosque.store');

Route::get('business/center/index', [FundaProjectBusinessCenter::class, 'index'])->name('business.center.index');
Route::post('business/center/store', [FundaProjectBusinessCenter::class, 'store'])->name('business.center.store');

Route::get('hostel/project/index', [SupportHostelController::class, 'index'])->name('hostel.project.index');
Route::get('hostel/project/payments', [SupportHostelController::class, 'Payments'])->name('hostel.project.payments');
Route::post('hostel/project/payments/store', [SupportHostelController::class, 'store'])->name('hostel.project.payments.store');