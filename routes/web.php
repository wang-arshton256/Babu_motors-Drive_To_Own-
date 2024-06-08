<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserRolesController;
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

Route::get('CloseSale/{id}', [PaymentsController::class, 'CloseSale'])->name('CloseSale')->middleware("auth");

Route::get('BeneficiarySelectedMyProfile', [PaymentsController::class, 'BeneficiarySelectedMyProfile'])->name('BeneficiarySelectedMyProfile')->middleware("auth");

Route::post('CreateClientAcc', [UserRolesController::class, 'CreateClientAcc'])->name('CreateClientAcc')->middleware("auth");

Route::get('ManageCleintsUsers', [UserRolesController::class, 'ManageCleintsUsers'])->name('ManageCleintsUsers')->middleware("auth");

Route::get('DeleteUserRole/{id}', [UserRolesController::class, 'DeleteUserRole'])->name('DeleteUserRole')->middleware("auth");

Route::post('CreateUserRole', [UserRolesController::class, 'CreateUserRole'])->name('CreateUserRole')->middleware("auth");

Route::get('ManageUsers', [UserRolesController::class, 'ManageUsers'])->name('ManageUsers')->middleware("auth");

Route::get('DeletePayment/{id}', [PaymentsController::class, 'DeletePayment'])->name('DeletePayment')->middleware("auth");

Route::get('Defaulters', [ApplicationsController::class, 'Defaulters'])->name('Defaulters')->middleware("auth");

Route::get('ClosedSales', [ApplicationsController::class, 'ClosedSales'])->name('ClosedSales')->middleware("auth");

Route::get('ApproveApplication/{id}', [ApplicationsController::class, 'ApproveApplication'])->name('ApproveApplication')->middleware("auth");

Route::post('RecordPayment', [PaymentsController::class, 'RecordPayment'])->name('RecordPayment')->middleware("auth");

Route::get('RemoveFromDefaulters/{id}', [PaymentsController::class, 'RemoveFromDefaulters'])->name('RemoveFromDefaulters')->middleware("auth");

Route::get('AddToDefaulters/{id}', [PaymentsController::class, 'AddToDefaulters'])->name('AddToDefaulters')->middleware("auth");

Route::get('GotoRecordPayment/{id}', [PaymentsController::class, 'GotoRecordPayment'])->name('GotoRecordPayment')->middleware("auth");

Route::post('BeneficiarySelected', [PaymentsController::class, 'BeneficiarySelected'])->name('BeneficiarySelected')->middleware("auth");

Route::get('SelectBeneficiary', [PaymentsController::class, 'SelectBeneficiary'])->name('SelectBeneficiary')->middleware("auth");

Route::get('DeleteCarPhotos/{id}', [CarController::class, 'DeleteCarPhotos'])->name('DeleteCarPhotos')->middleware("auth");

Route::get('ViewCarPhoto/{id}', [CarController::class, 'ViewCarPhoto'])->name('ViewCarPhoto')->middleware("auth");

Route::get('DeleteApps/{id}', [ApplicationsController::class, 'DeleteApps'])->name('DeleteApps')->middleware("auth");

Route::post('CreateApps', [ApplicationsController::class, 'CreateApps'])->name('CreateApps')->middleware("auth");

Route::get('ManageApps', [ApplicationsController::class, 'ManageApps'])->name('ManageApps')->middleware("auth");

Route::get('/ViewCarPhoto/{id}', [CarController::class, 'ViewCarPhoto'])->name('ViewCarPhoto')->middleware("auth");

Route::post('/AttachCarPhoto', [CarController::class, 'AttachCarPhoto'])->name('AttachCarPhoto')->middleware("auth");

Route::post('/UpdateCar', [CarController::class, 'UpdateCar'])->name('UpdateCar')->middleware("auth");

Route::post('/DeleteCar', [CarController::class, 'DeleteCar'])->name('DeleteCar')->middleware("auth");

Route::post('/CreateNewCar', [CarController::class, 'CreateNewCar'])->name('CreateNewCar')->middleware("auth");

Route::get('/ManageCars', [CarController::class, 'ManageCars'])->name('ManageCars')->middleware("auth");

Route::post('/UpdateBeneficiary', [BeneficiaryController::class, 'UpdateBeneficiary'])->name('UpdateBeneficiary')->middleware("auth");

Route::get('/DeleteBeneficiary/{id}', [BeneficiaryController::class, 'DeleteBeneficiary'])->name('DeleteBeneficiary')->middleware("auth");

Route::post('/CreateBeneficiary', [BeneficiaryController::class, 'CreateBeneficiary'])->name('CreateBeneficiary')->middleware("auth");

Route::get('/', [MainController::class, 'Dashboard'])->middleware("auth");

Route::get('/dashboard', [MainController::class, 'Dashboard'])->name('Dashboard')->middleware("auth");

Route::get('/ManageBeneficiaries', [BeneficiaryController::class, 'ManageBeneficiaries'])->name('ManageBeneficiaries')->middleware("auth");

require __DIR__.'/auth.php';
