<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $cacheKey = 'products:' . md5($request->fullUrl());
        
        return Cache::remember($cacheKey, now()->addHours(1), function () use ($request) {
            $query = Product::query();
            
            if ($request->has('category')) {
                $query->where('category_id', $request->category);
            }

            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }

            $products = $query->paginate(12);

            return ProductResource::collection($products);
        });
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function featured()
    {
        $products = Product::where('is_featured', true)
            ->with('category')
            ->take(6)
            ->get();
            
        return ProductResource::collection($products);
    }

    public function related(Product $product)
    {
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('category')
            ->take(4)
            ->get();
            
        return ProductResource::collection($related);
    }
} 