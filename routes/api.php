<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* 
 * Routes du Back Office (Interface administrateur)
 * */
// Ajout d'un produit
Route::post('/postProduct', [ProductController::class, 'addNewProduct'])->name('postProduct.addNewProduct');

// Modification d'un produit
Route::put('/routeEditProduct/{id}', [ProductController::class, 'updateProduct'])->name('routeEditProduct.updateProduct');

// Suppression d'un produit
Route::delete('/deleteProductRoute/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProductRoute.deleteProduct');


/* 
 * Routes du Front Office (Interface utilisateur)
 * */
// Affichage de tous les produits
Route::get('/products', [ProductController::class, 'getAllProducts']);
