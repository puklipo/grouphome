<?php

use App\Http\Controllers\Admin\OperatorHomeController;
use App\Http\Controllers\Admin\OperatorRequestController;
use App\Http\Controllers\AreaIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\RequestController;
use App\Http\Controllers\PrefController;
use App\Http\Controllers\SitemapController;
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

Route::view(uri: '/', view: 'home')->name('index');

Route::resource('home', HomeController::class)
     ->only(['index', 'show']);

Route::get('pref/{pref}/{area?}', PrefController::class)->name('pref');

Route::get('area', AreaIndexController::class)->name('area.index');

Route::view(uri: 'history', view: 'history')->name('history');

Route::middleware(['auth:sanctum', 'verified'])
     ->get('/dashboard', DashboardController::class)
     ->name('dashboard');

Route::prefix('operator')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('request/{home}', RequestController::class)->name('operator.request');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'can:admin'])->group(function () {
    Route::view(uri: '/', view: 'admin.index')->name('admin');
    Route::resource('operator-requests', OperatorRequestController::class);
    Route::view('contacts', 'admin.contacts')->name('admin.contacts');

    Route::controller(OperatorHomeController::class)
         ->prefix('operator-home')
         ->as('operator-home.')
         ->group(function () {
             Route::get('/', 'index')->name('index');
             Route::delete('/{user}/{home}', 'destroy')->name('destroy');
         });
});

Route::get('sitemap', SitemapController::class)->name('sitemap');

Route::view(uri: 'contact', view: 'contact')->name('contact');
Route::view(uri: 'license', view: 'license')->name('license');
Route::view(uri: 'help/operator', view: 'help.operator')->name('help.operator');
Route::view(uri: 'help/user', view: 'help.user')->name('help.user');
Route::view(uri: 'matching', view: 'matching.matching')->name('matching');
