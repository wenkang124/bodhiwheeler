<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ApprovedBookingController;
use App\Http\Controllers\Admin\PendingApprovalController;
use App\Http\Controllers\Admin\RejectedBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', LoginController::class)->name('guest:admin');
Route::post('login', [LoginController::class, 'authenticate'])->name('.login')->middleware('guest:admin');
Route::any('logout', [LoginController::class, 'logout'])->name('.logout')->middleware('auth:admin');


Route::middleware(['auth:admin'])->scopeBindings()->group(function () {
    Route::get('', [DashboardController::class, 'index']);

    Route::group(['prefix' => 'me', 'as' => '.me'], function () {
        Route::get('edit', [MeController::class, 'edit'])->name('.edit');
        Route::post('update', [MeController::class, 'update'])->name('.update');
        Route::get('edit-password', [MeController::class, 'editPassword'])->name('.edit-password');
        Route::post('update-password', [MeController::class, 'updatePassword'])->name('.update-password');
    });

    Route::prefix('admins')->name('.admin')->group(function () {
        Route::get('', [AdminController::class, 'index']);
        Route::post('query', [AdminController::class, 'query'])->name('.query');
        Route::get('create', [AdminController::class, 'create'])->name('.create');
        Route::post('', [AdminController::class, 'store'])->name('.store');
        Route::get('{admin}/edit', [AdminController::class, 'edit'])->name('.edit');
        Route::post('{admin}', [AdminController::class, 'update'])->name('.update');
        Route::delete('{admin}', [AdminController::class, 'delete'])->name('.delete');
    });

    Route::prefix('drivers')->name('.driver')->group(function () {
        Route::get('', [DriverController::class, 'index']);
        Route::post('query', [DriverController::class, 'driverQuery'])->name('.query');
        Route::get('create', [DriverController::class, 'create'])->name('.create');
        Route::post('store', [DriverController::class, 'store'])->name('.store');
        Route::get('{driver}/edit', [DriverController::class, 'edit'])->name('.edit');
        Route::post('{driver}', [DriverController::class, 'update'])->name('.update');
        Route::delete('{driver}', [DriverController::class, 'delete'])->name('.delete');
    });

    Route::prefix('bookings')->name('.booking')->group(function () {
        Route::prefix('pending-approvals')->name('.pending-approval')->group(function () {
            Route::get('', [PendingApprovalController::class, 'index']);
            Route::post('query', [PendingApprovalController::class, 'pendingReviewQuery'])->name('.query');
            Route::get('{booking}/detail', [PendingApprovalController::class, 'detail'])->name('.detail');
            Route::post('{booking}/update-status', [PendingApprovalController::class, 'updateStatus'])->name('.update-status');
        });

        Route::prefix('approved-bookings')->name('.approved-booking')->group(function () {
            Route::get('', [ApprovedBookingController::class, 'index']);
            Route::post('query', [ApprovedBookingController::class, 'approvedBookingQuery'])->name('.query');
            Route::get('{booking}/detail', [ApprovedBookingController::class, 'detail'])->name('.detail');
        });

        Route::prefix('rejected-bookings')->name('.rejected-booking')->group(function () {
            Route::get('', [RejectedBookingController::class, 'index']);
            Route::post('query', [RejectedBookingController::class, 'rejectedBookingQuery'])->name('.query');
            Route::get('{booking}/detail', [RejectedBookingController::class, 'detail'])->name('.detail');
        });

        Route::get('{booking}/edit', [BookingController::class, 'edit'])->name('.edit');
        Route::post('{booking}', [BookingController::class, 'update'])->name('.update');
    });
});
