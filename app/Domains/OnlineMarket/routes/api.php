<?php

use OnlineMarket\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);
// Route::resource('product-categories', ProductCategoryController::class);
// GET /{resource}
// route('resource.show', ['resource' => 'products', 'id' => 1])
Route::get('{resource}/', [ResourceController::class, 'index'])->name('resource.index');
Route::post('{resource}/', [ResourceController::class, 'store'])->name('resource.store');
Route::get('{resource}/{id}', [ResourceController::class, 'show'])->name('resource.show');
Route::put('{resource}/{id}', [ResourceController::class, 'update'])->name('resource.update');
Route::delete('{resource}/{id}', [ResourceController::class, 'destroy'])->name('resource.destroy');
// POST /{resource}/{id}
// GET /{resource}/{id}
// DELETE /{resource}/{id}
