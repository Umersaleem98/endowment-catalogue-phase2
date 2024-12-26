<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\TeamController;
use App\Http\Controllers\Pages\AboutUsController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\NustTrustFundController;
use App\Http\Controllers\Fund_Project\FundaProjectMosque;
use App\Http\Controllers\Endownment\Zakat\ZakatController;
use App\Http\Controllers\OneYear\OneYearSupportController;
use App\Http\Controllers\Pages\SignatureProgramController;
use App\Http\Controllers\Endownment\EndowmentHomeController;
use App\Http\Controllers\Fund_Project\FundProjectController;
use App\Http\Controllers\Fund_Project\FundaProjectBoysHostel;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Fund_Project\FundaProjectgirlsHostel;
use App\Http\Controllers\Dashboard\User\UserDashboardController;
use App\Http\Controllers\Fund_Project\FundaProjectBusinessCenter;
use App\Http\Controllers\Dashboard\Teams\TeamsDashboardController;
use App\Http\Controllers\Endownment\Four\FourYearSupportController;
use App\Http\Controllers\Dashboard\Events\EventsDashboardController;
use App\Http\Controllers\Endownment\Student\StudentStoriesController;
use App\Http\Controllers\Pages\ResourceMobilizationOfficerController;
use App\Http\Controllers\Dashboard\Endewment\EndoementZakatDashboardController;
use App\Http\Controllers\Dashboard\Endewment\DefultEndowmentDashboardController;
use App\Http\Controllers\Endownment\PerpetualSeat\PerpetualSeatSupportController;
use App\Http\Controllers\Dashboard\Endewment\CustomEndowmentOneyearDashboardController;
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
// Route::post('payments/{id}', [StudentStoriesController::class, 'paymentsstore']);
Route::post('/payments/{id}', [StudentStoriesController::class, 'store'])->name('payments.store');
Route::post('/pledge_payment/{id}', [StudentStoriesController::class, 'pledgestore'])->name('pledge_payment.store');
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
Route::get('students_delete/{id}', [StudentDashboardController::class, 'delete']);
// Custom Endownemt Dashboard Controller Routes 
Route::get('zakat_payments_list', [EndoementZakatDashboardController::class, 'index']);
// Defult Endownemt Dashboard Controller Routes 
Route::get('oneyear_endowment_list', [DefultEndowmentOneyearDashboardController::class, 'index']);
Route::get('fouryear_endowment_list', [DefultEndowmentOneyearDashboardController::class, 'indexforyear']);
Route::get('perpetualseat_endowment_list', [DefultEndowmentOneyearDashboardController::class, 'indexperpetualseat']);
// Custom Endownemt Dashboard Controller Routes 
Route::get('custom_oneyear_endowment_list', [CustomEndowmentOneyearDashboardController::class, 'index']);
Route::get('custom_fouryear_endowment_list', [CustomEndowmentOneyearDashboardController::class, 'indexforyear']);
Route::get('custom_perpetualseat_endowment_list', [CustomEndowmentOneyearDashboardController::class, 'indexperpetualseat']);
// Teams Dashboard Controller Routes 
Route::get('add_team', [TeamsDashboardController::class, 'index']);
Route::post('add_team_member', [TeamsDashboardController::class, 'store']);
Route::get('team_list', [TeamsDashboardController::class, 'show']);
Route::get('team_edit/{id}', [TeamsDashboardController::class, 'edit']);
Route::post('update_team/{id}', [TeamsDashboardController::class, 'update']);
Route::get('team_delete/{id}', [TeamsDashboardController::class, 'destory']);
// Events Dashboard Controller Routes 
Route::get('event_list', [EventsDashboardController::class, 'index']);
Route::get('event_create', [EventsDashboardController::class, 'create']);
Route::post('event_create', [EventsDashboardController::class, 'store']);
Route::get('event_edit/{id}', [EventsDashboardController::class, 'edit']);
Route::post('event_update/{id}', [EventsDashboardController::class, 'update']);
Route::get('event_delete/{id}', [EventsDashboardController::class, 'delete']);

Route::post('import', [StudentController::class, 'import'])->name('students.import');
// Users Dashboard Controller Routes 
Route::get('user_create', [UserDashboardController::class, 'index']);
Route::post('add_users', [UserDashboardController::class, 'store']);
Route::get('user_list', [UserDashboardController::class, 'userlist']);
Route::get('user_edit/{id}', [UserDashboardController::class, 'edit']);
Route::post('update_user/{id}', [UserDashboardController::class, 'update']);
Route::get('user_delete/{id}', [UserDashboardController::class, 'delete']);