<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\TeamController;
use App\Http\Controllers\Pages\AboutUsController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\NustTrustFundController;
use App\Http\Controllers\Pages\SignatureProgramController;
use App\Http\Controllers\Pages\ResourceMobilizationOfficerController;

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