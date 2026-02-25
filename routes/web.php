<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\RedirectSSOController;
use App\Http\Controllers\SSOController;
use Illuminate\Support\Facades\Route;

//Frontend View Management------------------------------------------------------------------------------>
Route::get('/',[FrontendController::class, 'index'] )->name('Home');
Route::get('/contact',[FrontendController::class, 'contact'])->name('Contact');
Route::post('/contact',[FrontendController::class, 'contact_submitted'])->name('Contact Submitted');
Route::get('/search', [FrontendController::class, 'myquery'])->name('Search Result');
Route::get('/product/{id}', [FrontendController::class, 'product_details'])->name('Single Product');
Route::post('/newsletter', [FrontendController::class, 'newsletter'])->name('Newsletter');


Route::middleware(['auth'])->get('/sso/token', [SSOController::class, 'token'])->name('sso.token');

Route::get('/sso/login', [SSOController::class, 'login'])->name('sso.login');

Route::middleware('auth')->get('/go-food', [RedirectSSOController::class, 'toFood'])->name('go.food');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

    Route::prefix('auth')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['create','edit','show']);
        Route::resource('products', ProductController::class)->except(['create','edit','show']);
        Route::resource('orders', OrderController::class);
    });
});
