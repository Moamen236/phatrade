<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FactoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\FarmController;

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout')
        ->middleware('admin');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () { //middleware(['admin'])->
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');;
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');;
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');;
    
    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
    Route::get('subscribers/export', [SubscriberController::class, 'export'])
        ->name('subscribers.export');

    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('factories', FactoryController::class);
    Route::resource('farms', FarmController::class);
});
