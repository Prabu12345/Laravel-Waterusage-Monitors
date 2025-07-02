<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WaterUsageController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/data', [App\Http\Controllers\DataController::class, 'index'])->name('data');
    Route::get('/data/create', [App\Http\Controllers\DataController::class, 'create'])->name('data.create');
    Route::post('/data', [App\Http\Controllers\DataController::class, 'store'])->name('data.store');
});

// about rout
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/detail1', function () {
    return view('detail1');
})->name('detail1');

Route::get('/detail2', function () {
    return view('detail2');
})->name('detail2');

Route::get('/detai3', function () {
    return view('detail3');
})->name('detail3');

Route::get('/detail4', function () {
    return view('detail4');
})->name('detail4');

// contact rout
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// water usage API routes use apiResource
Route::prefix('api')->middleware('api')->group(function () {
    Route::apiResource('water-usages', WaterUsageController::class);
});

// Water usage export routes
Route::prefix('water-usage')->group(function () {
    Route::get('export/pdf/{id}', [App\Http\Controllers\WaterUsage\UsageExportPDF::class, 'generatePDF'])->name('water-usage.export.pdf');
    Route::get('export/excel/{id}', [App\Http\Controllers\WaterUsage\UsageExportExcel::class, 'generateExcel'])->name('water-usage.export.excel');
});