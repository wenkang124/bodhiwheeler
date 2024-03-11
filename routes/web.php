<?php

use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/booking', [HomeController::class, 'booking'])->name('booking');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::group(['prefix' => 'booking', 'as' => 'booking'], function () {
    Route::get('/', [HomeController::class, 'booking']);
    Route::post('/submit-booking', [HomeController::class, 'submitBooking'])->name('.submit-booking');
    Route::get('/confirmation/{booking_id}', [HomeController::class, 'bookingConfirmation'])->name('.confirmation');
    Route::post('/submit-confirmation', [HomeController::class, 'submitConfirmation'])->name('.submit-confirmation');
});

Route::group(['prefix' => 'contact', 'as' => 'contact'], function () {
    Route::get('/', [HomeController::class, 'contact']);
    Route::post('/submit-contact', [HomeController::class, 'submitContact'])->name('.submit-contact');
});
