<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactFormController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SeoMetaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('contact-forms', ContactFormController::class)->only(['index', 'show', 'destroy']);
    Route::resource('newsletters', NewsletterController::class)->only(['index', 'destroy']);
    Route::resource('seo-metas', SeoMetaController::class);
});
