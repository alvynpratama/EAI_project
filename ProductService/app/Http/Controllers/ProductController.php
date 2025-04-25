<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Ambil semua produk
    public function index()
    {
        return response()->json(Product::all());
    }

    // Ambil produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }
}
