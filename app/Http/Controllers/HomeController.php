<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Banner;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('type', 'home')->get();
        $products = Product::latest()->take(4)->get();

        return view('home', compact('banners', 'products'));
    }

    public function subscribe(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:subscribers'
            ]);

            $subscriber = new Subscriber();
            $subscriber->name = $request->name;
            $subscriber->email = $request->email;
            $subscriber->save();

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()['email'][0] ?? 'Validation failed'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
