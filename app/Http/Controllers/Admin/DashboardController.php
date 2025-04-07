<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'contacts' => Contact::count(),
            'subscribers' => Subscriber::count(),
            'unread_messages' => Contact::where('is_read', false)->count(),
        ];

        $recent_contacts = Contact::latest()->take(5)->get();
        $recent_subscribers = Subscriber::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_subscribers'));
    }
} 