<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/lgt', function () {
    Session::flush();
    return redirect()->route('otpPage');
});
Route::get('/auth-user', function () {
    return view('otpLogin');
})->middleware('checkLogin')->name('otpPage');
Route::get('/', function () {
   // return view('user_home');
})->name('user.home');

Route::post('getOTP', [UserController::class, 'getOtp'])->name('getOTP');
Route::post('validateOTP', [UserController::class, 'validateOtp'])->name('validateOtp');

Route::get('/user/home', function () { return view('user_home'); })->name('user.home');
Route::get('/user/forword', function () { return view('forword'); })->name('user.forword');
Route::get('/user/preface', function () { return view('preface');})->name('user.preface');
Route::get('/user/acronyms-and-abbreviations', function () { return view('acronyms-and-abbreviations');})->name('user.acronyms');
Route::get('/user/population-ageing', function () { return view('population-ageing');})->name('user.population');


Route::get('user/module', [UserController::class, 'module'])->name('user.module');
Route::get('user/getAssessment/{mid}', [UserController::class, 'getAssessment'])->name('user.assessment');
Route::get('user/getPostAssessment', [UserController::class, 'getPostAssessment'])->name('user.post.assessment');

Route::get('user/getAssessmentByModuleId/{module_id}', [UserController::class, 'getAssessmentByModuleId'])->name('user.getAssessmentByModuleId');

Route::post('submitAssessment', [UserController::class, 'submitAssessment'])->name('user.submitAssessment');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/moduls', [App\Http\Controllers\admin\ModuleController::class, 'index'])->name('modules');
Route::post('/moduls', [App\Http\Controllers\admin\ModuleController::class, 'add'])->name('modules.add');
Route::post('/modul/delete/{id}', [App\Http\Controllers\admin\ModuleController::class, 'destroy'])->name('module.delete');
Route::post('/upload/images', [App\Http\Controllers\admin\ModuleController::class, 'upload'])->name('modules.upload.images');
Route::get('/getModuleById/{id?}', [App\Http\Controllers\admin\ModuleController::class, 'getModuleById'])->name('getModuleById');

Route::get('/assessment', [App\Http\Controllers\admin\AssessmentController::class, 'index'])->name('assessment');
Route::get('/editAssessment/{id}', [App\Http\Controllers\admin\AssessmentController::class, 'editAssessment'])->name('edit.assessment');

Route::post('/assessment/{type?}', [App\Http\Controllers\admin\AssessmentController::class, 'add'])->name('assessment.add');
Route::post('/assessment/delete/{id}', [App\Http\Controllers\admin\AssessmentController::class, 'destroy'])->name('assessment.delete');


Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index'])->name('users');

Route::get('/pre-assessment/{type?}', [App\Http\Controllers\admin\AssessmentController::class, 'preAssessment'])->name('pre-assessment');

Route::get('/post-assessment/{type?}', [App\Http\Controllers\admin\AssessmentController::class, 'postAssessment'])->name('post-assessment');
Route::get('/getAssessmentById/{id?}', [App\Http\Controllers\admin\AssessmentController::class, 'getAssessmentById'])->name('getAssessmentById');



