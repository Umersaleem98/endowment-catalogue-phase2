<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\TeamController;
use App\Http\Controllers\Pages\AboutUsController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\NustTrustFundController;
use App\Http\Controllers\Endownment\Zakat\ZakatController;
use App\Http\Controllers\OneYear\OneYearSupportController;
use App\Http\Controllers\Pages\SignatureProgramController;
use App\Http\Controllers\Endownment\EndowmentHomeController;
use App\Http\Controllers\Fund_Project\FundProjectController;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Endownment\Four\FourYearSupportController;
use App\Http\Controllers\Endownment\Student\StudentStoriesController;
use App\Http\Controllers\Pages\ResourceMobilizationOfficerController;
use App\Http\Controllers\Dashboard\Endewment\DefultEndowmentDashboardController;
use App\Http\Controllers\Endownment\PerpetualSeat\PerpetualSeatSupportController;
use App\Http\Controllers\Dashboard\Endewment\DefultEndowmentOneyearDashboardController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/',[HomeController::class, 'index']);

Route::get('/our_team',[TeamController::class, 'index']);
Route::get('/meet_out_team/{id}',[TeamController::class, 'About_team']);
Route::get('/r_m_o',[ResourceMobilizationOfficerController::class, 'index']);
Route::get('/signrature_program',[SignatureProgramController::class, 'index']);
Route::get('/nust_trust_foundation',[NustTrustFundController::class, 'index']);
Route::get('/about_us',[AboutUsController::class, 'index']);
Route::get('/contact_us',[ContactUsController::class, 'index']);

// Endoenment Model routes and controllers 

Route::get('/select_endowment_model',[EndowmentHomeController::class, 'index']);
// One Year support endoement fund routes and controllers 
Route::get('/support_for_one_year',[OneYearSupportController::class, 'index']);
Route::post('/default_one_year_degree',[OneYearSupportController::class, 'DefultOneYearundergraduate']);
Route::post('/endowmentsupportoneyear',[OneYearSupportController::class, 'CustomOneYearundergraduate']);
// One Year support endoement fund routes and controllers 
Route::get('support_for_entire_year', [FourYearSupportController::class, 'index']);
Route::post('/default_package_full_degree',[FourYearSupportController::class, 'DefultFourYearundergraduate']);
Route::post('/endowmentsupportentireyear',[FourYearSupportController::class, 'CustomFourYearundergraduate']);
// perpetual_seat support endoement fund routes and controllers 
Route::get('perpetualseatyourname', [PerpetualSeatSupportController::class, 'index']);
Route::post('/default_perpetual_seat',[PerpetualSeatSupportController::class, 'DefultPerpetualSeatundergraduate']);
Route::post('/perpetualseatyourname',[PerpetualSeatSupportController::class, 'CustomPerpetualSeatundergraduate']);
// Zakat fund routes and controllers 
Route::get('endowment_zakat_funds', [ZakatController::class, 'index']);
Route::get('endowment_zakat_payment', [ZakatController::class, 'zakatPayment']);
Route::post('endowment_zakat_payment', [ZakatController::class, 'payments']);
// Students stories routes and controllers 

Route::get('student_stories', [StudentStoriesController::class, 'student_stories']);
Route::get('student_stories_indiviual/{id}', [StudentStoriesController::class, 'student_stories_ind']);
Route::get('payment/{id}', [StudentStoriesController::class, 'payment_index']);
Route::get('Make_a_Pledge/{id}', [StudentStoriesController::class, 'Make_a_Pledge']);
Route::post('payments', [StudentStoriesController::class, 'paymentsstore']);
// Other Projects routes and controllers 

Route::get('select_project', [FundProjectController::class, 'index']);
Route::get('fund_project/{id}', [FundProjectController::class, 'FundProject']);
Route::get('payments_project/{id}', [FundProjectController::class, 'payment_fund_a_project']);
Route::post('fund_a_project', [FundProjectController::class, 'payment_fund_a_project_store']);

// auth routes for dashboard
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

// Students Dashboard Controller Routes 
Route::get('student_list', [StudentDashboardController::class, 'index']);
Route::get('students_edit/{id}', [StudentDashboardController::class, 'edit']);
Route::post('students_update/{id}', [StudentDashboardController::class, 'update']);


// Defult Endownemt Dashboard Controller Routes 
Route::get('oneyear_endowment_list', [DefultEndowmentOneyearDashboardController::class, 'index']);