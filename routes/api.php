<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\VleController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\Vle\AppointmentController;
use App\Http\Controllers\Api\Vle\AuthController;
use App\Http\Controllers\Api\Vle\InvoiceController as VleInvoiceController;

/* Doctor */
use App\Http\Controllers\Api\Doctor\UserController;
use App\Http\Controllers\Api\Doctor\DoctorController;
use App\Http\Controllers\Api\Doctor\DashboardController;
use App\Http\Controllers\Api\Doctor\PrescriptionController;

use App\Http\Controllers\Api\CompanyController;
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
    Route::get('getall', [App\Http\Controllers\Api\CompanyController::class, 'index']);
    Route::post('create', [App\Http\Controllers\Api\CompanyController::class, 'create']);
    Route::get('edit/{id}', [App\Http\Controllers\Api\CompanyController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\Api\CompanyController::class, 'update']);
    Route::post('delete/{id}', [App\Http\Controllers\Api\CompanyController::class, 'deleteData']);
    Route::get('getbyCIN/{id}', [App\Http\Controllers\Api\CompanyController::class, 'getbyCIN']);
});

Route::post('/importp',[App\Http\Controllers\Api\PatientController::class, 'importPatient']);
Route::post('/change-date',[App\Http\Controllers\Api\PatientController::class, 'changeDate']);

Route::post('doctor/login', 'Api\Doctor\AuthController@login');
Route::post('patient/login', 'Api\Patient\AuthController@login');
Route::post('patient/forgot-password', 'Api\Patient\AuthController@forgot_password');
Route::post('patient/reset', 'Api\Patient\AuthController@reset');

Route::post('patient/register', 'Api\Patient\AuthController@register');
Route::post('doctor/register', 'Api\Doctor\AuthController@register');
Route::post('doctor/degree/add', 'Api\Doctor\AuthController@addDrDegree');
Route::post('doctor/kyc/add',  'Api\Doctor\AuthController@addDrKyc' );
Route::post('contact', 'Api\Patient\AuthController@contact');
Route::post('doctor/forgot-password', 'Api\Doctor\AuthController@forgot_password');
Route::post('temp_img/add', 'Api\Doctor\AuthController@addTempImg');

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::post('doctor/logout', 'Api\Doctor\AuthController@logout');

    Route::post('patient/logout', 'Api\Patient\AuthController@logout');
    Route::get('patient/profile/', 'Api\Patient\AuthController@getAuthUser');
    Route::post('patient/profile/update/{id}', 'Api\Patient\HomeController@profileUpdate');
    Route::post('patient/changepass/', 'Api\Patient\HomeController@changepass');
    Route::get('patient/appointments/', 'Api\Patient\HomeController@appointments');
});


/* dev@ashish 2022-05-03 */
Route::prefix('doctor')->group(function(){
        Route::post('profile',   [UserController::class, 'profile']);
        Route::post('profile/update',   [UserController::class, 'profileUpdate']);
        /* Education */
        Route::post('education/add',   [UserController::class, 'educationAdd']);
        Route::post('education/update',   [UserController::class, 'educationUpdate']);
        Route::post('education/delete',   [UserContrexperienceoller::class, 'educationDelete']);
        /* Experience */
        Route::post('experience/add',   [UserController::class, 'experienceAdd']);
        Route::post('experience/update',   [UserController::class, 'experienceUpdate']);
        Route::post('experience/delete',   [UserController::class, 'experienceDelete']);

        /* all prescription */
        Route::post('prescriptions', [PrescriptionController::class, 'index']);
        Route::post('prescription/view', [PrescriptionController::class, 'view']);
        Route::post('prescription/create', [PrescriptionController::class, 'create']);
        Route::post('prescription/update', [PrescriptionController::class, 'update']);
        Route::post('patient_prescriptions', [PrescriptionController::class, 'patientPrescriptions']);
        Route::post('prescription/diagnosis_reports', [PrescriptionController::class, 'diagnosisReports']);

        Route::post('diagonosis', [PrescriptionController::class, 'diagonosis']);
        /* additional advises */
        Route::post('additional_advises', [PrescriptionController::class, 'additionalAdvises']);
        /* advises */
        Route::post('advises', [PrescriptionController::class, 'advises']);
        /* advise_investigations */
        Route::post('advise_investigations', [PrescriptionController::class, 'adviseInvestigations']);
        /* drugs */
        Route::post('drugs', [PrescriptionController::class, 'drugs']);
        /* Add new drug */
        Route::post('drug/create', [PrescriptionController::class, 'addDrug']);
        /* patientses */
        Route::post('patientses', [PrescriptionController::class, 'patientses']);
        Route::post('patients-search', [PrescriptionController::class, 'patientsSearch']);

        Route::post('dashboard',   [DashboardController::class, 'dashboard']);
        Route::post('dashboard/graph',   [DashboardController::class, 'dashboardGraph']);

        Route::post('appointments',   [DoctorController::class, 'appointments']);

        Route::post('appointments/search',   [DoctorController::class, 'search_appointments']);

        Route::post('appointment/list/by_date',   [DoctorController::class, 'appointmentListByDate']);

        Route::post('appointment/view',   [DoctorController::class, 'appointmentView']);

        Route::post('appointment/schedule', [DoctorController::class, 'schedule']);
        Route::post('appointment/schedule/add', [DoctorController::class, 'addSchedule']);

        Route::post('live_consults',   [DoctorController::class, 'liveConsults']);
        Route::post('live_consult/edit',   [DoctorController::class, 'liveConsultEdit']);

        Route::post('appointment/join',   [DoctorController::class, 'appointmentJoin']);
});


/* dev@ashish 2022-04-07 */

Route::prefix('nict')->group(function () {
    Route::prefix('vle')->group(function () {
        Route::post('getall',   [VleController::class, 'index']);
        Route::post('chambers', [VleController::class, 'chambers']);
        Route::post('create',   [VleController::class, 'create']);
        Route::post('view',     [VleController::class, 'viewVle']);
        Route::post('session',   [VleController::class, 'VleSession']);
        Route::post('session/view', [VleController::class, 'viewVleSession']);
    });


    Route::prefix('wallet')->group(function () {
        Route::post('getall', [WalletController::class, 'index']);
        Route::post('transactions', [WalletController::class, 'transactions']);
        Route::post('transactions/view', [WalletController::class, 'viewTrx']);
        Route::post('/request', [WalletController::class, 'withdrawRequest']);
        Route::post('/request/view', [WalletController::class, 'withdrawRequestView']);
        Route::post('request-approval-data', [WalletController::class, 'approvalConfirm']);
        Route::post('/request/approve', [WalletController::class, 'withdrawRequestApprove']);
        Route::post('request/reject', [WalletController::class, 'withdrawRequestReject']);
        Route::post('request/reason', [WalletController::class, 'viewRejectReason']);
        Route::post('topup', [WalletController::class, 'topupRequest']);
        Route::post('topup/view', [WalletController::class, 'topupRequestView']);
        Route::post('topupRequestReject', [WalletController::class, 'topupRequestReject']);
        Route::post('approveTopupRequest', [WalletController::class, 'approveTopupRequest']);
    });


    Route::prefix('invoice')->group(function () {
        Route::post('getall', [InvoiceController::class, 'index']);
        Route::post('/view', [InvoiceController::class, 'view']);
        Route::post('/nict', [InvoiceController::class, 'createNICTInvoice']);
        Route::post('transactions', [InvoiceController::class, 'transactions']);
        // Route::post('/request-amount','InvoiceController@saveNictInvoiceData');
    });
});

// Vle apis

Route::prefix('vle')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::prefix('appointment')->group(function () {
        Route::post('/', [AppointmentController::class, 'index']);
        Route::post('create', [AppointmentController::class, 'create']);
    });

    Route::prefix('invoice')->group(function () {
        Route::post('/', [VleInvoiceController::class, 'vle_invoice']);
        Route::post('/details/{id}', [VleInvoiceController::class, 'details']);
    });

    Route::prefix('wallet')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\Vle\WalletController::class, 'index']);
    });

    Route::prefix('withdraw_request')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\Vle\WalletController::class, 'withdrawRequest']);
        Route::post('add', [App\Http\Controllers\Api\Vle\WalletController::class, 'withdrawRequestAdd']);
    });
});

// staff apis
Route::prefix('staff')->group(function () {
    Route::post('login', [App\Http\Controllers\Api\Staff\AuthController::class, 'login']);
    Route::prefix('appointment')->group(function () {
        Route::post('/create', [App\Http\Controllers\Api\Staff\AppointmentController::class, 'create']);
        Route::post('/', [App\Http\Controllers\Api\Staff\AppointmentController::class, 'index']);
    });
    Route::prefix('patient')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\Staff\PatientController::class, 'index']);
        Route::post('/details/{id}', [App\Http\Controllers\Api\Staff\PatientController::class, 'details']);
        Route::post('/create', [App\Http\Controllers\Api\Staff\PatientController::class, 'create']);
        Route::post('/delete', [App\Http\Controllers\Api\Staff\PatientController::class, 'deleteData']);
        Route::post('/update', [App\Http\Controllers\Api\Staff\PatientController::class, 'updateData']);
    });
});


Route::post('join_us', [CompanyController::class, 'joinUs']);
Route::post('contact_us', [CompanyController::class, 'contactUs']);