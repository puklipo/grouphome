<?php

use App\Http\Controllers\Admin\ContactPreviewController;
use App\Http\Controllers\Admin\OperatorHomeController;
use App\Http\Controllers\Admin\OperatorRequestController;
use App\Http\Controllers\AreaIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mail\FormController;
use App\Http\Controllers\Mail\PrepareController;
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

Route::get('home/{home}/prepare', PrepareController::class)
    ->name('home.mail.prepare');

Route::get('home/{home}/mail', FormController::class)
    ->name('home.mail.form')
    ->middleware('signed');

Route::get('pref/{pref}/{area?}', PrefController::class)->name('pref');

Route::get('area', AreaIndexController::class)->name('area.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('/dashboard', DashboardController::class)
    ->name('dashboard');

Route::prefix('operator')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('request/{home}', RequestController::class)->name('operator.request');
});

Route::prefix('admin')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'can:admin'])->group(function () {
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

Route::get('contact/preview/{contact}', ContactPreviewController::class)
    ->name('contact.preview')
    ->middleware('signed');

Route::get('sitemap', SitemapController::class)->name('sitemap');
