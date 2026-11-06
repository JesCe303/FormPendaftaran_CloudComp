<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('registration.create');

Route::post('/pendaftaran', [RegistrationController::class, 'store'])
    ->name('registration.store');

// Keep submissions from older cached views working during deployment.
Route::post('/', [RegistrationController::class, 'store']);
