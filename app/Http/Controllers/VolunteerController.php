<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function create()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $volunteerData = json_decode(file_get_contents(public_path('json/volunteer.json')), true)['volunteerData'];

        return view('volunteer', compact('volunteerData','header','footerData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
            'phone_code' => 'required|string',
            'phone_number' => 'required|string|max:15',
        ]);



        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}
