<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    
    Route::get('products', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('products/{product}', [App\Http\Controllers\Api\ProductController::class, 'show']);
    // Route::get('categories', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    
    // Protected routes
    Route::middleware(['auth:sanctum', 'api.rate.limit'])->group(function () {
        Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::post('contact', [App\Http\Controllers\Api\ContactController::class, 'store']);
        // Route::post('subscribe', [App\Http\Controllers\Api\SubscriberController::class, 'store']);
        
        // Admin routes
        Route::middleware(['admin'])->group(function () {
            Route::post('products', [App\Http\Controllers\Api\ProductController::class, 'store']);
            Route::put('products/{product}', [App\Http\Controllers\Api\ProductController::class, 'update']);
            Route::delete('products/{product}', [App\Http\Controllers\Api\ProductController::class, 'destroy']);
        });
    });
    
    // Categories
    // Route::get('categories/{category}/products', [App\Http\Controllers\Api\CategoryController::class, 'products']);
    
    // Banners
    Route::get('banners', [App\Http\Controllers\Api\BannerController::class, 'index']);
    
    // Search
    Route::get('search', [App\Http\Controllers\Api\SearchController::class, 'index']);
    
    // Featured Products
    Route::get('products/featured', [App\Http\Controllers\Api\ProductController::class, 'featured']);
    
    // Related Products
    Route::get('products/{product}/related', [App\Http\Controllers\Api\ProductController::class, 'related']);
    
    // Categories with Products Count
    // Route::get('categories/with-stats', [App\Http\Controllers\Api\CategoryController::class, 'withStats']);
}); 