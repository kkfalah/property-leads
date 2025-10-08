<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadActivityController;
use App\Http\Controllers\LeadController;
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



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('leads', LeadController::class);
Route::post('leads/{lead}/activities', [LeadActivityController::class, 'store'])->name('leads.activities.store');
