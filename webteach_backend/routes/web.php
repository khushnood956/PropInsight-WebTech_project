<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/listings', [PropertyController::class, 'index'])->name('listings.index');
Route::get('/property/{slug}', [PropertyController::class, 'show'])->name('property.show');
Route::post('/property/{slug}/request', [PropertyController::class, 'requestAnalysis'])->name('property.request');

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.process');

Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::post('/compare/add', [CompareController::class, 'add'])->name('compare.add');
Route::post('/compare/remove/{id}', [CompareController::class, 'remove'])->name('compare.remove');

Route::get('/map', [PageController::class, 'map'])->name('map');