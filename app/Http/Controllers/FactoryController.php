<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Banner;

class FactoryController extends Controller
{
    public function index()
    {
        $factories = Factory::all();
        $banner = Banner::where('type', 'factories')->latest()->first();
        return view('factories', compact('factories', 'banner'));
    }
} 