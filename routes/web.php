<?php

use App\Http\Controllers\Admin\OperatorRequestController;
use App\Http\Controllers\AreaIndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Operator\RequestController;
use App\Http\Controllers\PrefAreaController;
use App\Http\Controllers\PrefController;
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

Route::get('/', IndexController::class)->name('index');

Route::resource('home', HomeController::class);

Route::get('pref/{pref}/area/{area}', PrefAreaController::class)->name('pref.area');
Route::get('pref/{pref}', PrefController::class)->name('pref');

Route::get('area', AreaIndexController::class)->name('area.index');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', DashboardController::class)
    ->name('dashboard');

Route::prefix('operator')->middleware(['auth:sanctum'])->group(function () {
    Route::post('request/{home}', RequestController::class)->name('operator.request');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::resource('operator-requests', OperatorRequestController::class);
});

Route::view('contact', 'contact')->name('contact');
Route::view('license', 'license')->name('license');
