<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/* 
 * Routes du BackOffice (Interface administrateur)
 * */
// Affichage du Dashboard
Route::get('/', function () {
    return view('backOffice');
});

// Affichage de tous les produits
Route::get('/productRoute', [ProductController::class, 'getAllProductsBack']);


/* 
 * Routes du FrontOffice (Interface utilisateur)
 * */