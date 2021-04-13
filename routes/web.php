<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\UserKycApplicationsController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/register/verify/{code}', [AuthController::class, 'verify']);
Route::view('/login/verify', 'auth.login_otp_token')->middleware('otp.token');
Route::post('/login/verify', [AuthController::class, 'verifyLoginToken'])->middleware('otp.token')->name('auth.login.verify');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.showForgotPasswordForm');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetEmail'])->name('auth.sendPasswordResetEmail');
Route::get('/reset-password', [AuthController::class, 'showPasswordResetForm'])->name('auth.showPasswordResetForm');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');


Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::view('/change/password', 'auth.change-password')->name('auth.change.password');
    Route::put('/change/password', [AuthController::class, 'updatePassword'])->name('auth.update.password');

    // Merchant
    Route::name('merchant.')->prefix('merchant')->group(function () {
        Route::get('/', [MerchantController::class, 'index'])->name('index');
    });

    // KYC
    Route::name('kyc.')->prefix('kyc')->group(function () {
        Route::get('/create', [UserKycApplicationsController::class, 'create'])->name('create');
        Route::post('/', [UserKycApplicationsController::class, 'store'])->name('store');
    });

});
