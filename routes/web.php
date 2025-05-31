<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars/{car}', [HomeController::class, 'showCarDetail'])->name('showCarDetail');
Route::get('/cars', [HomeController::class, 'browseCars'])->name('browseCars');
Route::get('/credit-simulation', [HomeController::class, 'showCreditForm'])->name('creditForm');
Route::post('/credit-simulation', [HomeController::class, 'simulateCredit'])->name('simulateCredit');
Route::get('/cars/filter', [HomeController::class, 'filter'])->name('filterCars');
Route::get('/brands', [HomeController::class, 'browseBrands'])->name('browseBrands');

Route::get('/news', [HomeController::class, 'browseNews'])->name('browseNews');
Route::get('/show-news/{id}', [HomeController::class, 'showNews'])->name('showNews');



// static routes
Route::get('/about', function () {
    return view('about');
})->name('about');

// temporary static routes (might change it to controller)
Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

// store bisa diakses tanpa login
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');


// guest routes
Route::middleware('guest')->group(function () {
    Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('loginPage');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});


// authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/dashboard/brands', BrandController::class);
    Route::resource('/dashboard/cars', CarController::class);
    Route::resource('/dashboard/news', NewsController::class);

    // resource tanpa store
    Route::resource('/dashboard/appointments', AppointmentController::class)->except(['store']);

    Route::patch('/appointments/{appointment}/status/{status}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    Route::patch('/news/{news}/status/{status}', [NewsController::class, 'updateStatus'])->name('news.updateStatus');
});
// Route::middleware('guest')->post('/dashboard/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
