<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class CertificateController extends Controller
{
    public function index()
    {
        $banner = Banner::where('type', 'certifications')->latest()->first();
        return view('certificates', compact('banner'));
    }
} 