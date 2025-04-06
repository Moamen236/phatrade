<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CertificateController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/factories', [FactoryController::class, 'index'])->name('factories');
Route::get('/farm', [FarmController::class, 'index'])->name('farm');
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Newsletter subscription route
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


include 'adminRoutes.php';