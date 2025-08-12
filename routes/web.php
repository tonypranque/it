<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Список услуг
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Услуга и подуслуги
Route::get('/services/{parentSlug}', [ServiceController::class, 'show'])->name('services.show.parent');
Route::get('/services/{parentSlug}/{childSlug}', [ServiceController::class, 'show'])->name('services.show.child');

Route::get('/{parentSlug}/{childSlug?}', [PageController::class, 'show'])->name('page.show');

Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});
