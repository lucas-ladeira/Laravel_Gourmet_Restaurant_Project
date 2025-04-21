<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /* 
     * Fonctions du BackOffice (Interface administrateur)
     * */
    // Affichage de tous les produits
    public function getAllProductsBack()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // Ajout d'un produit
    public function addNewProduct(Request $request)
    {
        $product = new Product();
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;

        // Traitment de l'image
        if ($request->hasFile("productImage")) {
            $file = $request->file("productImage");
            $imageName = time() . "." . $file->getClientOriginalName();
            $file->move(public_path("assets/images"), $imageName);
        }
        $product->productImage = $imageName;

        $product->save();
        return redirect()->back();
    }

    // Suppression d'un produit
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        // Traitment de l'image
        if (file_exists(public_path("assets/images/" . $product->productImage))) {
            try {
                unlink(public_path("assets/images/" . $product->productImage));
            } catch (\Throwable $th) {
                Log::error("L'image n'existe pas: " . $th->getMessage());
            }
        }
        $product->delete();

        return redirect()->back();
    }

    // Edition d'un produit
    public function editProduct($id)
    {
        $produit = Product::findOrFail($id);
        return view('editProduct', compact('product'));
    }


    /* 
     * Fonctions du Front (Interface utilisateur)
     * */
    // Affichage de tous les produits
    public function getAllProducts()
    {
        $products = Product::all();
        return view('front.products', compact('products'));
    }
}
