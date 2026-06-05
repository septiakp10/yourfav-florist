<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Menampilkan semua data product beserta relasi category dan brand.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();

        return view('product', compact('products'));
    }
}
