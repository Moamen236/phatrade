<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        // Save to database
        $contact = Contact::create($validated);

        // Send email notification
        Mail::to('info@phatrade-eg.com')->send(new ContactFormSubmission($validated));

        return back()->with('success', 'Thank you for your message. We will contact you soon!');
    }
}