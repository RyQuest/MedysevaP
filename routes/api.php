<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\VleController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\InvoiceController;

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

Route::get('gethealthframefromscanidandCID/{scan_id}/{mobile}', [App\Http\Controllers\Api\PatientController::class, 'gethealthframefromscanidandCID']);


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
Route::post('doctor/register', 'Api\Doctor\AuthController@register');
Route::post('contact', 'Api\Patient\AuthController@contact');

Route::group(['middleware' => 'auth.jwt'], function () {
    
    Route::post('doctor/logout', 'Api\Doctor\AuthController@logout');
    
    Route::post('patient/logout', 'Api\Patient\AuthController@logout');
    Route::get('patient/profile/', 'Api\Patient\AuthController@getAuthUser');
    Route::post('patient/profile/update/{id}', 'Api\Patient\HomeController@profileUpdate');
    Route::post('patient/changepass/', 'Api\Patient\HomeController@changepass');
    Route::get('patient/appointments/', 'Api\Patient\HomeController@appointments');
    
});


/* dev@ashish 2022-04-07 */

Route::prefix('vle')->group(function(){
    Route::post('getall',   [VleController::class, 'index']);
    Route::post('chambers', [VleController::class, 'chambers']);
    Route::post('create',   [VleController::class, 'create']);
    Route::post('view',     [VleController::class, 'viewVle']);
    Route::post('session',   [VleController::class, 'VleSession']);
    Route::post('session/view',[VleController::class, 'viewVleSession']);
});


Route::prefix('wallet')->group(function(){
    Route::post('getall', [WalletController::class, 'index'] );
    Route::post('transactions', [WalletController::class, 'transactions']);
    Route::post('transactions/view',[WalletController::class, 'viewTrx']);
    Route::post('/request',[WalletController::class, 'withdrawRequest']);
    Route::post('/request/view',[WalletController::class, 'withdrawRequestView']);
    Route::post('request-approval-data', [WalletController::class, 'approvalConfirm']);
    Route::post('/request/approve', [WalletController::class, 'withdrawRequestApprove']);
    Route::post('request/reject', [WalletController::class, 'withdrawRequestReject']);
    Route::post('request/reason', [WalletController::class, 'viewRejectReason']);
    Route::post('topup', [WalletController::class, 'topupRequest']);
    Route::post('topup/view', [WalletController::class, 'topupRequestView'] );
    Route::post('topupRequestReject', [WalletController::class, 'topupRequestReject']);
    Route::post('approveTopupRequest', [WalletController::class, 'approveTopupRequest'] );
});


Route::prefix('invoice')->group(function(){
    Route::post('getall', [InvoiceController::class, 'index']);
    Route::post('/view',[InvoiceController::class, 'view']);
    Route::post('/nict',[InvoiceController::class, 'createNICTInvoice']);
    Route::post('transactions', [InvoiceController::class ,'transactions']);
    // Route::post('/request-amount','InvoiceController@saveNictInvoiceData');
});