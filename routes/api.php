<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(ProductsController::class)->prefix('/products')->group(function () {
        Route::get('/', 'index');
        Route::get('/{productId}', 'show');
    });
});
