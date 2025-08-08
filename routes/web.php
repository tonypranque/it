<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Список услуг
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Услуга и подуслуги
Route::get('/services/{parentSlug}', [ServiceController::class, 'show'])->name('services.show.parent');
Route::get('/services/{parentSlug}/{childSlug}', [ServiceController::class, 'show'])->name('services.show.child');

Route::get('/{parentSlug}/{childSlug?}', [PageController::class, 'show'])->name('page.show');

