<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserKycApplicationController;
use App\Http\Controllers\UserController;

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


Route::group(['middleware' => 'otp.token'], function() {
    Route::view('/login/verify', 'auth.login_otp_token');
    Route::post('/login/verify', [AuthController::class, 'verifyLoginToken'])
        ->name('auth.login.verify');
    Route::post('/send/otp/code', [AuthController::class, 'sendOTPCode'])
        ->name('auth.send.otp.code');
});

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.showForgotPasswordForm');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetEmail'])->name('auth.sendPasswordResetEmail');
Route::get('/reset-password', [AuthController::class, 'showPasswordResetForm'])->name('auth.showPasswordResetForm');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');


Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::view('/change/password', 'auth.change-password')->name('auth.change.password');
    Route::put('/change/password', [AuthController::class, 'updatePassword'])->name('auth.update.password');
    Route::view('/new/password', 'auth.new-password')->name('auth.new.password');
    Route::put('/new/password', [AuthController::class, 'newPassword'])->name('auth.new.password');

    // KYC
    Route::name('kyc.')->prefix('kyc')->group(function () {
        Route::get('/step/{step?}', [UserKycApplicationController::class, 'create'])->name('create');
        Route::post('/store/step1', [UserKycApplicationController::class, 'storeStep1'])->name('store.step1');
    });

    Route::get('/country-state/{code_country}', [StateController::class, 'getStatesByCountry']);
    Route::get('/country-state-city/{code_state}', [StateController::class, 'getCitiesByState']);

    Route::get('/profile/edit', [UserController::class, 'profile'])->name('profile.edit');

    Route::group([
        'prefix' => 'notifications',
        'as' => 'notifications.',
    ], function () {
        Route::view('/', 'notifications.index')->name('index');
    });
});
