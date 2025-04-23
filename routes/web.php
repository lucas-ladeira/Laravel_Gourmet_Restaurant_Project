<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/* 
 * Routes du BackOffice (Interface administrateur)
 * */
// Affichage du Dashboard
Route::get('/dashboard', function () {
    return view('backOffice');
});

// Affichage de tous les produits
Route::get('/productRoute', [ProductController::class, 'getAllProductsBack']);

// Ajout d'un produit
Route::get('/addProductRoute', function () {
    return view('addProduct');
});

// Edition d'un produit
Route::get('/routeEditProduct/{id}', [ProductController::class, 'editProduct'])->name('routeEditProduct.editProduct');


/* 
 * Routes du FrontOffice (Interface utilisateur)
 * */
// Affichage de tous les produits
Route::get('/', [ProductController::class, 'getAllProducts'])
    ->name('front.index');

// Affichage un seul produit
Route::get('/getDetails', function () {
    return view('front.singleProduct');
});

Route::get('/routeSingleProduct/{id}', [ProductController::class, 'showSingleProduct'])->name('routeSingleProduct.showSingleProduct');
