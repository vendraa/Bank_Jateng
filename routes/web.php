<?php

use App\Http\Controllers\Nasabah\DaftarNasabahController;
use App\Http\Controllers\Nasabah\DataNasabahController;
use App\Http\Controllers\PHRController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/data-nasabah', [DataNasabahController::class, 'create'])->name('create');
Route::post('/data-nasabah', [DataNasabahController::class, 'store'])->name('store');

Route::get('/daftar-nasabah', [DaftarNasabahController::class, 'index'])->name('index');

// Route untuk menampilkan form edit
Route::get('/daftar-nasabah/edit/{id}', [DaftarNasabahController::class, 'edit'])->name('nasabah.edit');

// Route untuk update data nasabah
Route::put('/daftar-nasabah/update/{id}', [DaftarNasabahController::class, 'update'])->name('nasabah.update');

// Route untuk delete nasabah
Route::delete('/daftar-nasabah/delete/{id}', [DaftarNasabahController::class, 'destroy'])->name('nasabah.destroy');

Route::get('/phr-nasabah', [PHRController::class, 'index'])->name('phr.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
