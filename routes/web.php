<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
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
    return view('dashboard');
});

require __DIR__ . '/auth.php';

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

use App\Http\Controllers\KategorijaController;

Route::get('/upravljanje-zanr', [KategorijaController::class, 'index']);
Route::get('/upravljanje-zanr/{kategorija}', [KategorijaController::class, 'show']);
Route::post('/upravljanje-zanr', [KategorijaController::class, 'store']);
Route::patch('/upravljanje-zanr/{kategorijaID}', [KategorijaController::class, 'update']);
Route::delete('/upravljanje-zanr/{kategorija}', [KategorijaController::class, 'destroy']);

use App\Http\Controllers\AutorController;
use App\Http\Controllers\IzdavacController;

Route::get('/upravljanje-autor', [AutorController::class, 'index']);
Route::get('/upravljanje-autor/{autor}', [AutorController::class, 'show']);
Route::post('/upravljanje-autor', [AutorController::class, 'store']);
Route::put('/upravljanje-autor/{autorID}', [AutorController::class, 'update']);
Route::delete('/upravljanje-autor/{autor}', [AutorController::class, 'destroy']);

use App\Http\Controllers\KnjigaController;
Route::get('/upravljanje-knjiga', [KnjigaController::class, 'index']);
Route::get('/upravljanje-knjiga/{knjiga}', [KnjigaController::class, 'show']);
Route::post('/upravljanje-knjiga', [KnjigaController::class, 'store']);
Route::put('/upravljanje-knjiga/{knjigaID}', [KnjigaController::class, 'update']);
Route::delete('/upravljanje-knjiga/{knjiga}', [KnjigaController::class, 'destroy']);

Route::get('/upravljanje-izdavac', [IzdavacController::class, 'index']);
Route::get('/upravljanje-izdavac/{izdavac}', [IzdavacController::class, 'show']);
Route::post('/upravljanje-izdavac', [IzdavacController::class, 'store']);
Route::put('/upravljanje-izdavac/{izdavacID}', [IzdavacController::class, 'update']);
Route::delete('/upravljanje-izdavac/{izdavac}', [IzdavacController::class, 'destroy']);