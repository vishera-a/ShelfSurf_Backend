<?php

use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KnjigaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#Route::resource('knjige', KnjigaController::class);

Route::get('/admin/panel', [UserController::class, 'GetAdminPanel'])->name('GetAdminPanel');
Route::get('/TestIzdavac', [IzdavacController::class, 'test'])->name('TestIzdavac');
Route::post('/TestIzdavacStore', [IzdavacController::class, 'store'])->name('TestIzdavacStore');

require __DIR__.'/auth.php';
