<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/{parentSlug}/{childSlug?}', [PageController::class, 'show'])->name('page.show');
