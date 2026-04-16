<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function() {
        return redirect()->route('dashboard');
    })->name('home');

    Route::resource('equipments', \App\Http\Controllers\EquipmentController::class);
    Route::resource('incidents', \App\Http\Controllers\IncidentController::class);
});
