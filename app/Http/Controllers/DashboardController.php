<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalStok = Product::sum('stok');

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalStok'
        ));
    }
}
