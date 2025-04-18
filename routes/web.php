<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// Coaching
Route::get('/abouts', [AboutController::class, 'index'])->name('abouts');

// Guides
Route::get('/guides', [GuideController::class, 'index'])->name('guides');

// Coaching
Route::get('/ressources', [RessourceController::class, 'index'])->name('ressources');

Route::get('/ressource/{slug}', [RessourceController::class, 'show'])->name('ressources.show');

// Coaching
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites');

Route::get('/actualite/{slug}', [ActualiteController::class, 'show'])->name('actualites.show'); 

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Utilisateur + roles
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('actualites', App\Http\Controllers\Admin\ActualiteController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategorieController::class);
    Route::resource('ressources', App\Http\Controllers\Admin\RessourceController::class);
});

// Authentification (login, register, logout, etc.)
require __DIR__.'/auth.php';


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

