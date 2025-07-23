<?php

use App\Http\Controllers\UsageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WaterUsageController;

Route::get('/', function () {
    return view('homepage.home');
});

Auth::routes();

// homepage routes
Route::get('/home', [App\Http\Controllers\HomepageController::class, 'home'])->name('homepage.home');
Route::get('/about', [App\Http\Controllers\HomepageController::class, 'about'])->name('homepage.about');
Route::get('/contact', [App\Http\Controllers\HomepageController::class, 'contact'])->name('homepage.contact');
Route::post('/contact', [App\Http\Controllers\HomepageController::class, 'sendContact'])->name('homepage.sendContact');
Route::get('/detail1', [App\Http\Controllers\HomepageController::class, 'detail1'])->name('homepage.detail1');
Route::get('/detail2', [App\Http\Controllers\HomepageController::class, 'detail2'])->name('homepage.detail2');
Route::get('/detail3', [App\Http\Controllers\HomepageController::class, 'detail3'])->name('homepage.detail3');
Route::get('/detail4', [App\Http\Controllers\HomepageController::class, 'detail4'])->name('homepage.detail4');

// Routing for authenticated users
Route::middleware('auth')->group(function () {
    // Dashboard and data routes
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/tips', [App\Http\Controllers\DashboardController::class, 'tips'])->name('dashboard.tips');

    Route::get('/waterusage', [App\Http\Controllers\WaterUsage\UsageController::class, 'index'])->name('waterusage.index');
    Route::get('/waterusage/create', [App\Http\Controllers\WaterUsage\UsageController::class, 'create'])->name('waterusage.create');
    Route::post('/waterusage', [App\Http\Controllers\WaterUsage\UsageController::class, 'store'])->name('waterusage.store');
    Route::get('/waterusage/{id}/edit', [App\Http\Controllers\WaterUsage\UsageController::class, 'edit'])->name('waterusage.edit');
    Route::put('/waterusage/{id}', [App\Http\Controllers\WaterUsage\UsageController::class, 'update'])->name('waterusage.update');
    Route::delete('/waterusage/{id}', [App\Http\Controllers\WaterUsage\UsageController::class, 'destroy'])->name('waterusage.destroy');
});

// water usage API routes use apiResource
Route::prefix('api')->middleware('api')->group(function () {
    Route::apiResource('water-usages', WaterUsageController::class);
});

// Water usage export routes
Route::prefix('water-usage')->group(function () {
    Route::get('/export/pdf', [App\Http\Controllers\WaterUsage\ExportController::class, 'pdf'])->name('waterusage.export.pdf');
    Route::get('/export/excel', [App\Http\Controllers\WaterUsage\ExportController::class, 'excel'])->name('waterusage.export.excel');
});