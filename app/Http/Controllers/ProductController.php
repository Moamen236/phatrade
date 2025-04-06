<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order')->get();
        $products = Product::with('category')->get();
        $banner = Banner::where('type', 'products')->latest()->first();
        return view('products', compact('categories', 'products', 'banner'));
    }

    public function show(Product $product)
    {
        $categories = Category::orderBy('order')->get();
        $banner = Banner::where('type', 'products')->latest()->first();
        return view('product', compact('product', 'categories', 'banner'));
    }
}
