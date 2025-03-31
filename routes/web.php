<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PHRController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Nasabah\DataNasabahController;
use App\Http\Controllers\Nasabah\DaftarNasabahController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/data-nasabah', [DataNasabahController::class, 'create'])->name('nasabah.create');
    Route::post('/data-nasabah', [DataNasabahController::class, 'store'])->name('nasabah.store');

    Route::get('/daftar-nasabah', [DaftarNasabahController::class, 'index'])->name('nasabah.index');
    Route::get('/daftar-nasabah/edit/{id}', [DaftarNasabahController::class, 'edit'])->name('nasabah.edit');
    Route::put('/daftar-nasabah/update/{id}', [DaftarNasabahController::class, 'update'])->name('nasabah.update');
    Route::delete('/daftar-nasabah/delete/{id}', [DaftarNasabahController::class, 'destroy'])->name('nasabah.destroy');


    Route::get('/phr-nasabah', [PHRController::class, 'index'])->name('phr.index');
    Route::get('/phr/output/{nasabah}', [PhrController::class, 'showOutput'])->name('phr.output.show');
    Route::get('/phr-nasabah/create/{nasabah}', [PHRController::class, 'create'])->name('phr.create');
    Route::post('/phr-nasabah/create', [PHRController::class, 'store'])->name('phr.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.delete');
});

require __DIR__.'/auth.php';
