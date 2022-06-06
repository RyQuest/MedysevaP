<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/dump-autoload', function() {
    "<pre>". shell_exec ('composer dump-autoload')."</pre>";
    return 'Dump autoload'; 
});
\Auth::routes();
Route::get('home',function(){
    dd(\Auth::user());
});
Route::group(['middleware' => 'web'], function () {
    Route::get('/speciality','ApiController@index');
    Route::match(['post'],'/appointment','ApiController@store');
    
    Route::get('signin','User\LoginController@index');
    Route::post('signin','User\LoginController@login')->name('user-login');
    
    Route::name('user.')->middleware('checkLogin')->namespace('User')->group(function () {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('dashboard/vle-graph','DashboardController@dashboardVleGraph')->name('dashboardVleGraph');
        Route::get('logout','DashboardController@logout')->name('logout');
        Route::prefix('invoice')->group(function(){
            Route::get('/','InvoiceController@index')->name('invoices');
            Route::get('/view/{id}','InvoiceController@view')->name('invoiceView');
            Route::get('transactions','InvoiceController@transactions')->name('transactions');
        });
        Route::prefix('vle')->group(function(){
            Route::get('/','VleController@index')->name('vle');
            Route::get('add','VleController@add')->name('vleAdd');
            Route::post('create','VleController@create')->name('vleCreate');
        });
        Route::prefix('patient')->group(function(){
            Route::get('/','PatientController@index')->name('patient');
            Route::get('/view/{id}','PatientController@viewDetails')->name('patientView');
        });
        Route::prefix('wallet')->group(function(){
            Route::get('/','WalletController@index')->name('wallet');
            Route::get('/request','WalletController@withdrawRequest')->name('withdrawRequest');
            Route::get('/request/view/{id}','WalletController@withdrawRequestView')->name('withdrawRequestView');
            
            Route::get('request-approval-data','WalletController@approvalConfirm')->name('approvalConfirm');
            
            Route::post('/request/approve','WalletController@withdrawRequestApprove')->name('withdrawRequestApprove');
            Route::post('request/reject','WalletController@withdrawRequestReject')->name('withdrawRequestReject');
            Route::get('request/reason','WalletController@viewRejectReason')->name('viewRejectReason');
            Route::get('transactions','WalletController@transactions')->name('walletTransactions');
            Route::get('transactions/view/{id}','WalletController@viewTrx')->name('viewTrx');
        });
    });
});