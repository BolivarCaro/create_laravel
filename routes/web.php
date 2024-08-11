<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/registro', RegistrosController::class);




Route::get('/CustomerData', [ClienteController::class, 'index'])->name('CustomerData.index');
Route::post('/CustomerData', [ClienteController::class, 'store'])->name('CustomerData.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/CustomerData', [ClienteController::class, 'index'])->name('CustomerData');
});

require __DIR__ . '/auth.php';
