<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HostelProjectController;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Dashboard\User\UserDashboardController;
use App\Http\Controllers\Dashboard\Teams\TeamsDashboardController;
use App\Http\Controllers\Dashboard\Events\EventsDashboardController;
use App\Http\Controllers\Dashboard\Hostel\DashboardHostelController;
use App\Http\Controllers\Dashboard\StudentStory\DashboardStudentsStory;
use App\Http\Controllers\Dashboard\Country\CountryDataManagmentController;
use App\Http\Controllers\Dashboard\Courses\CoursePGdataManagmentController;
use App\Http\Controllers\Dashboard\Courses\CourseUGdataManagmentController;
use App\Http\Controllers\Dashboard\Fund_Project\DashboardFundaProjectMosque;
use App\Http\Controllers\Dashboard\Endewment\EndoementZakatDashboardController;
use App\Http\Controllers\Dashboard\Fund_Project\DashboardFundaProjectBoysHostel;
use App\Http\Controllers\Dashboard\Fund_Project\DashboardFundaProjectGirlsHostel;
use App\Http\Controllers\Dashboard\AdopedStudent\DashboardAdopedStudentController;
use App\Http\Controllers\Dashboard\HostelProject\DashboardHostelProjectController;
use App\Http\Controllers\Dashboard\Fund_Project\DashboardFundaProjectBusinessCenter;
use App\Http\Controllers\Dashboard\Endewment\CustomEndowmentOneyearDashboardController;
use App\Http\Controllers\Dashboard\Endewment\DefultEndowmentOneyearDashboardController;



// auth routes for dashboard
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    
Route::get('students', [StudentDashboardController::class, 'index'])->name('students.index');
Route::get('students/add', [StudentDashboardController::class, 'create'])->name('add.new.student');
Route::post('students/store', [StudentDashboardController::class, 'Store'])->name('store.new.student');
Route::get('students/adopted/{id}', [StudentDashboardController::class, 'Adopted'])->name('students.adopted');
Route::get('students/edit/{id}', [StudentDashboardController::class, 'Edit'])->name('students.edit');
Route::post('students/update/{id}', [StudentDashboardController::class, 'Update']);

Route::get('students/delete/{id}', [StudentDashboardController::class, 'Delete'])->name('students.delete');
Route::post('students/import', [StudentDashboardController::class, 'importExcel'])->name('students.import');
Route::post('students/export', [StudentDashboardController::class, 'exportSelected'])->name('students.export');
Route::post('students/bulkDelete', [StudentDashboardController::class, 'deleteSelected'])->name('students.bulkDelete');


// Adoped Student dashboard 
Route::get('adopted/students/list', [DashboardAdopedStudentController::class, 'index']);
Route::get('adopted/student/edit/{id}', [DashboardAdopedStudentController::class, 'edit']);
Route::post('adopted/student/update/{id}', [DashboardAdopedStudentController::class, 'Update']);

// // Update request
// Adoped Student dashboard 
Route::post('adopted/students/update/{id}', [DashboardAdopedStudentController::class, 'Update'])->name('students.update.adopted');

Route::get('/students/unadopted/{id}', [DashboardAdopedStudentController::class, 'Unadopted'])->name('students.unadopted');





// Custom Endownemt Dashboard Controller Routes 
Route::get('zakat/payments/list', [EndoementZakatDashboardController::class, 'index'])->name('zakat.payments.list');
Route::get('zakat/payments/delete/{id}', [EndoementZakatDashboardController::class, 'Delete'])->name('zakat.payments.delete');
// Defult Endownemt Dashboard Controller Routes 
Route::get('oneyear/endowment/list', [DefultEndowmentOneyearDashboardController::class, 'index'])->name('oneyear.endowment.list');
Route::get('defult.oneyear.destroy/{id}', [DefultEndowmentOneyearDashboardController::class, 'DeleteOneyear'])->name('defult.oneyear.destroy');

Route::get('fouryear/endowment/list', [DefultEndowmentOneyearDashboardController::class, 'indexforyear'])->name('fouryear.endowment.list');
Route::get('defult.fouryear.destroy/{id}', [DefultEndowmentOneyearDashboardController::class, 'DeleteFouryear'])->name('defult.fouryear.destroy');

Route::get('perpetualseat/endowment/list', [DefultEndowmentOneyearDashboardController::class, 'indexperpetualseat'])->name('perpetualseat.endowment.list');
Route::get('defult.perpetualseat.destroy/{id}', [DefultEndowmentOneyearDashboardController::class, 'Deleteperpetualseat'])->name('defult.perpetualseat.destroy');

// Custom Endownemt Dashboard Controller Routes 
Route::get('custom/oneyear/endowment/list', [CustomEndowmentOneyearDashboardController::class, 'index'])->name('custom.oneyear.endowment.list');
Route::get('custom/oneyear/endowment/delete/{id}', [CustomEndowmentOneyearDashboardController::class, 'DeleteOneyear'])->name('custom.oneyear.endowment.delete');

Route::get('custom/fouryear/endowment/list', [CustomEndowmentOneyearDashboardController::class, 'indexforyear'])->name('custom.fouryear.endowment.list');
Route::get('custom/fouryear/endowment/delete/{id}', [CustomEndowmentOneyearDashboardController::class, 'Deletefouryear'])->name('custom.fouryear.endowment.delete');
Route::get('custom/perpetualseat/endowment/list', [CustomEndowmentOneyearDashboardController::class, 'indexperpetualseat'])->name('custom.perpetualseat.endowment.list');
// Teams Dashboard Controller Routes 
Route::get('add/team', [TeamsDashboardController::class, 'index'])->name('add.team');
Route::post('add/team/member', [TeamsDashboardController::class, 'store']);
Route::get('team/list', [TeamsDashboardController::class, 'show'])->name('team.list');
Route::get('team/edit/{id}', [TeamsDashboardController::class, 'edit'])->name('team.edit');
Route::post('update/team/{id}', [TeamsDashboardController::class, 'update'])->name('team.update');
Route::get('team/delete/{id}', [TeamsDashboardController::class, 'destory'])->name('team.delete');
// Events Dashboard Controller Routes 

Route::get('event/list', [EventsDashboardController::class, 'index'])->name('event.list');
Route::get('event/create', [EventsDashboardController::class, 'create'])->name('event.create');
Route::post('event/create', [EventsDashboardController::class, 'store'])->name('event.store');
Route::get('event/edit/{id}', [EventsDashboardController::class, 'edit'])->name('event.edit');
Route::post('event/update/{id}', [EventsDashboardController::class, 'update'])->name('event.update');
Route::get('event/delete/{id}', [EventsDashboardController::class, 'delete'])->name('event.delete');

// Users Dashboard Controller Routes 
Route::get('user/create', [UserDashboardController::class, 'index'])->name('user.create');
Route::post('add/users', [UserDashboardController::class, 'store'])->name('add.users');
Route::get('user/list', [UserDashboardController::class, 'userlist'])->name('user.list');
Route::get('user/edit/{id}', [UserDashboardController::class, 'edit'])->name('user.edit');
Route::post('update/user/{id}', [UserDashboardController::class, 'update'])->name('users.update');
Route::get('user/delete/{id}', [UserDashboardController::class, 'delete'])->name('user.delete');
// Fund a projects dashboard 
Route::get('boys/hostel/project/list', [DashboardFundaProjectBoysHostel::class, 'list'])->name('boys.hostel.project.list');
Route::get('girls/hostel/project/list', [DashboardFundaProjectGirlsHostel::class, 'list'])->name('girls.hostel.project.list');
Route::get('mosque/project/list', [DashboardFundaProjectMosque::class, 'list'])->name('mosque.project.list');
Route::get('business/center/project/list', [DashboardFundaProjectBusinessCenter::class, 'list'])->name('business.center.project.list');

// Student stories dashboard 
Route::get('student/story/payment', [DashboardStudentsStory::class, 'Payment_index'])->name('student.story.payment');
Route::get('student/story/pledge/payment', [DashboardStudentsStory::class, 'Pledge_index'])->name('student.story.pledge.payment');


// Country data managment dashboard 
Route::get('country/data/list', [CountryDataManagmentController::class, 'index'])->name('country.data.list');
Route::get('country/data/index', [CountryDataManagmentController::class, 'create'])->name('country.data.index');
Route::post('country/data/create', [CountryDataManagmentController::class, 'store'])->name('country.data.store');
Route::post('country/delete/{id}', [CountryDataManagmentController::class, 'delete'])->name('country.destroy');

//PG Courses data managment dashboard

Route::get('ug/course/list', [CourseUGdataManagmentController::class, 'index'])->name('ug.course.list');
Route::get('ug/course/index', [CourseUGdataManagmentController::class, 'create'])->name('ug.course.index');
Route::post('ug/course/create', [CourseUGdataManagmentController::class, 'store'])->name('ug.course.store');
Route::get('course/edit/{id}', [CourseUGdataManagmentController::class, 'Edit'])->name('ug.course.edit');
Route::post('course/update/ug/{id}', [CourseUGdataManagmentController::class, 'Update'])->name('ug.course.update');
Route::get('course/delete/{id}', [CourseUGdataManagmentController::class, 'delete'])->name('course.destroy');

//UG Courses data managment dashboard

Route::get('pg/course/list', [CoursePGdataManagmentController::class, 'index'])->name('pg.course.list');
Route::get('pg/course/index', [CoursePGdataManagmentController::class, 'create'])->name('pg.course.index');
Route::post('pg/course/create', [CoursePGdataManagmentController::class, 'store'])->name('pg.course.store');
Route::get('course/edit/pg/{id}', [CoursePGdataManagmentController::class, 'EditPG'])->name('pg.course.edit');
Route::post('course/update/{id}', [CoursePGdataManagmentController::class, 'UpdatePG'])->name('pg.course.update');
Route::post('course/delete/{id}', [CoursePGdataManagmentController::class, 'delete'])->name('course.destroy.pg');

Route::get('hostel/list', [DashboardHostelController::class, 'index'])->name('hostel.list');
// Route::get('hostel/unmark/{id}', [DashboardHostelController::class, 'Unmark'])->name('unmark.payment.hostel');
Route::get('payments/delete/{id}', [DashboardHostelController::class, 'delete'])->name('delete.payment.hostel');

Route::get('hostel/project/payment/index', [DashboardHostelProjectController::class,'index'])->name('hostel.project.payment.list');

Route::get('hostel/project/payment/delete/{id}', [DashboardHostelProjectController::class,'delete'])->name('hostel.project.payment.delete');

});
