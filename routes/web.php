<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controller\Admin\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PanierController;
use App\Models\Produit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('home'); 
})->name('home');

// Coaching
Route::get('/abouts', [AboutController::class, 'index'])->name('abouts');

// Guides
Route::get('/guides', [GuideController::class, 'index'])->name('guides');

Route::get('/categorie/{id}', [CategorieController::class, 'show'])->name('categorie.show');

// Coaching
Route::get('/ressources', [RessourceController::class, 'index'])->name('ressources');

Route::get('/ressource/{slug}', [RessourceController::class, 'show'])->name('ressources.show');

// Coaching
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites');

Route::get('/actualite/{slug}', [ActualiteController::class, 'show'])->name('actualites.show'); 

Route::post('/actualite/{slug}', [ActualiteController::class, 'save'])->name('actualites.save'); 

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/chat', [ChatGPTController::class, 'index'])->name('chat.index');
Route::post('/chat', [ChatGPTController::class, 'ask'])->name('chat.ask');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

// Utilisateur + roles
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::resource('actualites', App\Http\Controllers\Admin\ActualiteController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategorieController::class);
    Route::resource('ressources', App\Http\Controllers\Admin\RessourceController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('newsletters', App\Http\Controllers\Admin\NewsletterController::class);
});

// Authentification (login, register, logout, etc.)
require __DIR__.'/auth.php';

Route::post('/abonnement/newsletter', [NewsletterController::class, 'subscribe'])->name('abonnement.newsletter');

//Route::get('/experts', [ExpertController::class, 'index'])->name('experts.index');
Route::get('/experts', function () {
    $populaires = Produit::inRandomOrder()->take(12)->get();
    return view('fronts.experts', compact('populaires'));
})->name('accueil');

Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');

Route::get('/catalogue', [ProduitController::class, 'index'])->name('catalogue');

Route::post('/ajouter-au-panier/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');

Route::get('/panier', [PanierController::class, 'voir'])->name('panier.voir');

Route::post('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

Route::post('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');

//Auth::routes();

