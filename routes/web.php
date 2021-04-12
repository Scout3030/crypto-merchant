<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
//use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/register/verify/{code}', [AuthController::class, 'verify']);
Route::name('merchant.')->prefix('merchant')->middleware('auth')->group(function () {
    Route::get('/', [MerchantController::class, 'index'])->name('index');
});
//Route::get('/test-mail', [UserController::class, 'testmail']);
