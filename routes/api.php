<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\IzdavacController;   
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('registerAPI');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('loginAPI');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.emailAPI');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.storeAPI');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verifyAPI');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.sendAPI');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logoutAPI');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logoutAPI');

Route::get('/knjige', [KnjigaController::class, 'index'])
    ->name('GetKnjige');

Route::post('/knjige', [KnjigaController::class, 'store'])
    ->name('GetKnjige');

Route::post('/upravljanje-zanr', [KategorijaController::class, 'store'])
    ->name('GetKategorija');
    Route::patch('upravljanje-zanr/{id}', 'KategorijeController@update');

 



    

Route::get('/upravljanje-zanr', [KategorijaController::class, 'index']);
Route::get('/upravljanje-zanr/{kategorija}', [KategorijaController::class, 'show']);
Route::post('/upravljanje-zanr', [KategorijaController::class, 'store']);
Route::patch('/upravljanje-zanr/{kategorijaID}', [KategorijaController::class, 'update']);
Route::delete('/upravljanje-zanr/{kategorija}', [KategorijaController::class, 'destroy']);





Route::post('/izdavaci', [IzdavacController::class, 'store'])->name('CreateIzdavac');
Route::resource('/upravljanje-zanr', KategorijaController::class);
