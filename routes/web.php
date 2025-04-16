<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/guides', [GuideController::class, 'index'])->name('guides');
Route::get('/abouts', [AboutController::class, 'index'])->name('abouts');
Route::get('/ressources', [RessourceController::class, 'index'])->name('ressources');
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites');
Route::get('/contact.send', [ContactController::class, 'showForm'])->name('contact');

// Auth
//Auth::routes(); // fournit /login et /register

