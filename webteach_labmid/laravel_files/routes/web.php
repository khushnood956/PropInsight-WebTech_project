<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CalculatorController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/listings', [PropertyController::class, 'index'])->name('listings.index');
Route::get('/property/{slug}', [PropertyController::class, 'show'])->name('property.show');

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.process');

Route::get('/compare', function() {
    return view('pages.compare');
})->name('compare');

Route::get('/map', function() {
    return view('pages.map');
})->name('map');
