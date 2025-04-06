<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class AboutController extends Controller
{
    public function index()
    {
        $banner = Banner::where('type', 'about')->latest()->first();
        return view('about', compact('banner'));
    }
} 