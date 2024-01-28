<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\StoreUserDataController;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MouseMoveController;
use App\Http\Controllers\ScrollSpeedController;
use App\Http\Controllers\ButtonClickController;
use App\Http\Controllers\KeyEventController;

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

Route::get('/', function () {
    return view('welcome');
});

// Define Custom User Registration & Login Routes
Route::controller(LoginRegisterController::class)->group(function () {

    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'home')->name('home');
    Route::post('/logout', 'logout')->name('logout');
});

// Define Custom Verification Routes
Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});

Route::post('/store-device-info', [StoreUserDataController::class, 'storeDeviceInfo'])->name('store.device.info');

Route::post('/get-ip-info', [StoreUserDataController::class, 'getIpInfo'])->name('get.ip.info');

Route::post('/store-mouse-move', [MouseMoveController::class, 'store']);

Route::post('/store-scroll-speed', [ScrollSpeedController::class, 'store']);

Route::post('/track-button-click', [ButtonClickController::class, 'trackButtonClick']);

Route::post('/track-key-event', [KeyEventController::class, 'trackKeyEvent']);