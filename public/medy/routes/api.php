<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('patient/add', [App\Http\Controllers\Api\PatientController::class, 'store']);

Route::post('patient/save', [App\Http\Controllers\Api\PatientController::class, 'savePatient']);
Route::get('gettotalscansfrommobile/{mobile}', [App\Http\Controllers\Api\PatientController::class, 'gettotalscansfrommobile']);

Route::prefix('company')->group(function () {
    Route::get('getall',[App\Http\Controllers\Api\CompanyController::class, 'index']);
    Route::post('create',[App\Http\Controllers\Api\CompanyController::class, 'create']);
    Route::get('edit/{id}',[App\Http\Controllers\Api\CompanyController::class, 'edit']);
    Route::post('update/{id}',[App\Http\Controllers\Api\CompanyController::class, 'update']);
    Route::post('delete/{id}',[App\Http\Controllers\Api\CompanyController::class, 'deleteData']);
    Route::get('getbyCIN/{id}',[App\Http\Controllers\Api\CompanyController::class, 'getbyCIN']);
    
});

Route::post('doctor/login', 'Api\Doctor\AuthController@login');
Route::post('patient/login', 'Api\Patient\AuthController@login');
Route::post('patient/forgot-password', 'Api\Patient\AuthController@forgot_password');
Route::post('patient/reset', 'Api\Patient\AuthController@reset');

Route::post('patient/register', 'Api\Patient\AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    
    Route::post('doctor/logout', 'Api\Doctor\AuthController@logout');
    
    Route::post('patient/logout', 'Api\Patient\AuthController@logout');
    Route::get('patient/profile/', 'Api\Patient\AuthController@getAuthUser');
    Route::post('patient/profile/update/{id}', 'Api\Patient\HomeController@profileUpdate');
    Route::get('patient/appointments/', 'Api\Patient\HomeController@appointments');
    
});