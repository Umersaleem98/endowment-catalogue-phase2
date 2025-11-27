<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\FundProjectAdminController;
use App\Http\Controllers\Admin\Hostel\HostelAdminController;
use App\Http\Controllers\Admin\Student\Excel\ExcelController;
use App\Http\Controllers\Home\Hostel\SupportHostelController;
use App\Http\Controllers\Admin\EndowmentModel\AnnualController;
use App\Http\Controllers\Home\EndowmentModel\ZakatFundController;
use App\Http\Controllers\Admin\EndowmentModel\FullDegreController;
use App\Http\Controllers\Admin\EndowmentModel\ZakatFundsController;
use App\Http\Controllers\Admin\EndowmentModel\PerpetualSeatController;
use App\Http\Controllers\Admin\AdoptedStudent\AdoptedStudentController;
use App\Http\Controllers\Admin\StudentStories\StudentStoriesPaymentController;
use App\Http\Controllers\Admin\HostelAdoptedStudent\HostelAdoptedStudentController;

require __DIR__ . '/home.php';

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route protected by auth middleware
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');

// Student routes without middleware
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('students/list', [StudentController::class, 'index'])->name('students.index');
Route::get('students/edit{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('students/adopted{id}', [StudentController::class, 'Adopted'])->name('students.adopted');
Route::get('students/adopted/Hostel{id}', [StudentController::class, 'AdoptedHostel'])->name('students.adopted.hostel');
Route::delete('students/delete/{id}', [StudentController::class, 'delete'])->name('students.destroy');
Route::delete('/students/delete-selected', [StudentController::class, 'bulkDelete'])->name('students.bulkDelete');
Route::post('/students/import', [ExcelController::class, 'import'])->name('students.import');

// Adopted Student routes without middleware

Route::get('sdopted/students/list', [AdoptedStudentController::class,'index'])->name('adopted-students.index');
Route::get('unsdopted/students/{id}', [AdoptedStudentController::class,'Unadopted'])->name('students.unadopted.status');

// Adopted Student routes without middleware
Route::get('hostel/sdopted/students/list', [HostelAdoptedStudentController::class,'index'])->name('hostel.adopted-students.index');
Route::get('hostel/unsdopted/students/{id}', [HostelAdoptedStudentController::class,'Unadopted'])->name('hostel.students.unadopted.status');


Route::get('/endowment/annual/defult', [AnnualController::class, 'Defult'])->name('endowment.annual.defult');
Route::delete('/annual/bulk-delete', [AnnualController::class, 'Defult_bulkDelete'])->name('annual.bulk.delete');
Route::delete('/annual/delete/{id}', [AnnualController::class, 'Defult_destroy'])->name('annual.delete');

Route::get('/endowment/annual/custom', [AnnualController::class, 'Custom'])->name('endowment.annual.custom');
Route::delete('/annual/custom/delete/{id}', [AnnualController::class, 'Custom_destroy'])
    ->name('annual.custom.delete');
Route::delete('/annual/custom/bulk-delete', [AnnualController::class, 'Custom_bulkDelete'])->name('annual.custom.bulk.delete');

Route::get('/endowment/fulldegree/defult', [FullDegreController::class, 'Defult'])->name('endowment.fulldegree.defult');
Route::delete('/fouryear/bulk-delete', [FullDegreController::class, 'Defult_bulkDelete'])->name('fouryear.bulk.delete');
Route::get('/endowment/fulldegree/custom', [FullDegreController::class, 'Custom'])->name('endowment.fulldegree.custom');
Route::delete('/fouryear/custom-bulk-delete', [FullDegreController::class, 'custom_bulkDelete'])->name('fouryear.custom.bulk.delete');

Route::get('/endowment/perpetual_seat/defult', [PerpetualSeatController::class, 'Defult'])->name('endowment.perpetual_seat.defult');
Route::delete('/perpetual-seat/bulk-delete', [PerpetualSeatController::class, 'Defult_bulkDelete'])->name('perpetualseat.bulk.delete');

Route::get('endowment.zakat.fund', [ZakatFundsController::class, 'index'])->name('endowment.zakat.fund');

Route::get('student/stories/paynow/index', [StudentStoriesPaymentController::class, 'payment_index'])->name('student.stories.paynow.index');
Route::get('student/stories/pledge/index', [StudentStoriesPaymentController::class, 'pledge_index'])->name('student.stories.pledge.index');

// Fund a projects 
Route::get('boys/Hostel/list', [FundProjectAdminController::class, 'BoysHostel'])->name('fundproject.boysHostel');
Route::get('girls/Hostel/list', [FundProjectAdminController::class, 'GirlsHostel'])->name('fundproject.girlsHostel');
Route::get('Mosque/list', [FundProjectAdminController::class, 'Mosque'])->name('fundproject.mosque');
Route::get('business/Center/list', [FundProjectAdminController::class, 'businessCenter'])->name('fundproject.businessCenter');


Route::get('team/index', [TeamController::class, 'index'])->name('team.index');
Route::get('team/create', [TeamController::class, 'Create'])->name('team.create');
Route::post('team/store', [TeamController::class, 'store'])->name('team.store');
Route::get('team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::put('team/update/{id}', [TeamController::class, 'update'])->name('team.update');
Route::delete('team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');

Route::get('support/hostel/index', [HostelAdminController::class, 'index'])->name('support.hostel.index');