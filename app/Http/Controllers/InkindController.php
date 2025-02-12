<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\InKindDonation;
use Illuminate\Http\Request;

class InkindController extends Controller
{
    public function showForm()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $inKindData = json_decode(file_get_contents(public_path('json/inkind.json')), true)['inKindData'];
        return view('inkind', compact('inKindData', 'header', 'footerData'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string',
            'address2' => 'nullable|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'postalCode' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'countryCode' => 'required|string',
            'description' => 'required|string',
            'estimatedValue' => 'required|numeric',
            'date' => 'required|date',
            'category' => 'required|string',
            'anonymousDonation' => 'nullable|boolean'
        ]);

        InKindDonation::create([
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'address' => $validatedData['address'],
            'address2' => $validatedData['address2'] ?? null,
            'city' => $validatedData['city'],
            'region' => $validatedData['region'] ?? null,
            'postal_code' => $validatedData['postalCode'],
            'country' => $validatedData['country'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'country_code' => $validatedData['countryCode'],
            'description' => $validatedData['description'],
            'estimated_value' => $validatedData['estimatedValue'],
            'date' => $validatedData['date'],
            'category' => $validatedData['category'],
            'anonymous_donation' => $validatedData['anonymousDonation'] ?? false,
        ]);

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}
