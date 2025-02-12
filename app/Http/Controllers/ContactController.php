<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $contactJson = file_get_contents(public_path('json/contactUs.json'));
        $contact = json_decode($contactJson, true);

        return view('contact', compact('contact', 'header', 'footerData'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'terms' => 'accepted'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Your message has been sent successfully!']);
    }
}
