<?php

use App\Http\Controllers\RegistrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/registro', RegistrosController::class);
