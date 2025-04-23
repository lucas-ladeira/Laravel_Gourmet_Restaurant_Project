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
        $product = Product::findOrFail($id);
        return view('editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id) {
        // validação + update aqui
        $product = Product::findOrFail($id);
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->save();
        return redirect()->route('routeEditProduct.editProduct', ['id' => $product->id]);
    }


    /* 
     * Fonctions du Front (Interface utilisateur)
     * */
    // Affichage de tous les produits
    public function getAllProducts()
    {
        $products = Product::paginate(6);
        return view('front.index', compact('products'));
    }

    public function showSingleProduct($id)
    {
        $product = Product::findOrFail($id);    // Retourner un seul produit
        return view('front.singleProduct', compact('product'));
    }
}
