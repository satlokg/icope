<?php

use App\Http\Controllers\api\CommonController;
use App\Http\Controllers\api\AssessmentController;
use App\Http\Controllers\api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/users/sendOTP', [LoginController::class, 'getOtp']);
Route::post('/users/validateOTP', [LoginController::class, 'validateOtp']);
Route::group(['middleware' => 'apiauth'], function (){
Route::post('/device/v1/pg/enlist', [AssessmentController::class, 'modulelist']);
Route::post('/pages/getAssessmentQuestions', [AssessmentController::class, 'getAssessment']);
Route::post('/pages/getQuestionnaireQuestions', [AssessmentController::class, 'getPrePostTest']);

// Route::get('getCountries', [AssessmentController::class, 'getCountries']);

Route::post('/pages/submitAssessmentQuestions', [AssessmentController::class, 'submitAssessmentQuestions']);
Route::post('/pages/submitQuestionnaireQuestions', [AssessmentController::class, 'submitQuestionnaireQuestions']);
Route::post('/searchContent', [AssessmentController::class, 'searchContent']);

// Route::post('submitgetPrePostTest', [CommonController::class, 'submitgetPrePostTest']);
});