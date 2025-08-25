<?php
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
use App\Http\Controllers\Dashboard\Fund_Project\DashboardFundaProjectBusinessCenter;
use App\Http\Controllers\Dashboard\Endewment\CustomEndowmentOneyearDashboardController;
use App\Http\Controllers\Dashboard\Endewment\DefultEndowmentOneyearDashboardController;


Route::get('/students', [StudentDashboardController::class, 'index'])->name('students.index');
Route::get('/students/adopted', [DashboardAdopedStudentController::class, 'Adopted_Students'])->name('students.adopted');
Route::get('/students/edit/{id}', [StudentDashboardController::class, 'edit'])->name('students.edit');
Route::post('/students/update/{id}', [StudentDashboardController::class, 'update'])->name('students.update');
Route::get('/students/delete/{id}', [StudentDashboardController::class, 'Delete'])->name('students.delete');
Route::post('/students/import', [StudentDashboardController::class, 'importExcel'])->name('students.import');
Route::post('/students/export', [StudentDashboardController::class, 'exportSelected'])->name('students.export');
Route::post('/students/bulkDelete', [StudentDashboardController::class, 'deleteSelected'])->name('students.bulkDelete');
// Route::get('/students/adopted/{id}', [StudentDashboardController::class, 'Adopted'])->name('students.adopted');



// Custom Endownemt Dashboard Controller Routes 
Route::get('zakat_payments_list', [EndoementZakatDashboardController::class, 'index']);
// Defult Endownemt Dashboard Controller Routes 
Route::get('oneyear_endowment_list', [DefultEndowmentOneyearDashboardController::class, 'index']);
Route::get('defult.oneyear.destroy/{id}', [DefultEndowmentOneyearDashboardController::class, 'Delete']);

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
Route::get('export', [StudentController::class, 'export']);
// Users Dashboard Controller Routes 
Route::get('user_create', [UserDashboardController::class, 'index']);
Route::post('add_users', [UserDashboardController::class, 'store']);
Route::get('user_list', [UserDashboardController::class, 'userlist']);
Route::get('user_edit/{id}', [UserDashboardController::class, 'edit']);
Route::post('update_user/{id}', [UserDashboardController::class, 'update']);
Route::get('user_delete/{id}', [UserDashboardController::class, 'delete']);
// Fund a projects dashboard 
Route::get('boys_hostel_project_list', [DashboardFundaProjectBoysHostel::class, 'list']);
Route::get('girls_hostel_project_list', [DashboardFundaProjectGirlsHostel::class, 'list']);
Route::get('mosque_project_list', [DashboardFundaProjectMosque::class, 'list']);
Route::get('business_center_project_list', [DashboardFundaProjectBusinessCenter::class, 'list']);

// Student stories dashboard 
Route::get('student_story_payment', [DashboardStudentsStory::class, 'Payment_index']);
Route::get('student_story_pledge_payment', [DashboardStudentsStory::class, 'Pledge_index']);

// Adoped Student dashboard 
Route::get('adopted_students_list', [DashboardAdopedStudentController::class, 'index']);


// Country data managment dashboard 
Route::get('country_data_list', [CountryDataManagmentController::class, 'index']);
Route::get('country_data_index', [CountryDataManagmentController::class, 'create']);
Route::post('country_data_create', [CountryDataManagmentController::class, 'store']);
Route::get('countrydelete/{id}', [CountryDataManagmentController::class, 'delete']);

//PG Courses data managment dashboard

Route::get('ug_course_list', [CourseUGdataManagmentController::class, 'index']);
Route::get('ug_course_index', [CourseUGdataManagmentController::class, 'create']);
Route::post('ug_course_create', [CourseUGdataManagmentController::class, 'store']);
Route::get('coursedelete/{id}', [CourseUGdataManagmentController::class, 'delete']);

//UG Courses data managment dashboard

Route::get('pg_course_list', [CoursePGdataManagmentController::class, 'index']);
Route::get('pg_course_index', [CoursePGdataManagmentController::class, 'create']);
Route::post('pg_course_create', [CoursePGdataManagmentController::class, 'store']);
Route::get('coursedelete/{id}', [CoursePGdataManagmentController::class, 'delete']);

Route::get('hostel_list', [DashboardHostelController::class, 'index']);
Route::get('payments_edit/{id}', [DashboardHostelController::class, 'delete']);