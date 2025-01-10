<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\ContactFormController;
use App\Http\Controllers\Api\SeoMetaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('blogs', BlogController::class);
Route::apiResource('portfolios', PortfolioController::class);
Route::apiResource('newsletters', NewsletterController::class)->only(['index', 'store', 'destroy']);
Route::apiResource('contact-forms', ContactFormController::class)->only(['index', 'show', 'store', 'destroy']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('seo-metas', SeoMetaController::class);