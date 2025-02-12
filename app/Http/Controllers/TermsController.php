<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        // Load the JSON file
        $termsJson = public_path('json/terms.json');
        $termsData = json_decode(file_get_contents($termsJson), true);

        // Pass the terms data to the view
        return view('terms', compact('termsData'));
    }
}
