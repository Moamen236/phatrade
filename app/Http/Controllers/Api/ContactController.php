<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        $contact = Contact::create($validated);

        // Send email notification
        Mail::to('info@phatrade-eg.com')
            ->queue(new ContactFormSubmission($validated));

        return response()->json([
            'message' => 'Thank you for your message. We will contact you soon!',
            'status' => 'success'
        ], 201);
    }
} 