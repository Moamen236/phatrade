<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Banner;
use App\Http\Controllers\Controller;

class FarmController extends Controller
{
    public function index()
    {
        $banner = Banner::where('type', 'farms')->latest()->first();
        $farms = Farm::all();
        return view('farm', compact('banner', 'farms'));
    }
} 