<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\RecipientData;
use App\Http\Controllers\RegistrosController;
use App\Models\Recipient;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/registro', RegistrosController::class);



//rutas de remitente
Route::get('/CustomerData', [ClienteController::class, 'index'])->name('CustomerData.index');
Route::post('/CustomerData', [ClienteController::class, 'store'])->name('CustomerData.store');

//rutas de destinatario
Route::get('/RecipientData', [RecipientController::class, 'index'])->name('RecipientData.index');
Route::post('/RecipientData', [RecipientController::class, 'store'])->name('RecipientData.store');




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
