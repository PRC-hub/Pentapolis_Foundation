<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonetaryDonationController extends Controller
{
    public function showForm()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $monetaryData = json_decode(file_get_contents(public_path('json/monetary.json')), true)['monetaryData'];
        return view('monetary', compact('monetaryData','header','footerData'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'payment' => 'required|string',
        ]);

        // Handle payment details based on selected method
        switch ($request->payment) {
            case 'debit_card':
            case 'credit_card':
                $request->validate([
                    'cardNumber' => 'required|string|max:16',
                    'ccv' => 'required|string|max:3',
                    'expiryDate' => 'required|date',
                ]);
                break;
            case 'upi':
                $request->validate([
                    'upiId' => 'required|string',
                ]);
                break;
            case 'bank_transfer':
                $request->validate([
                    'accountHolder' => 'required|string',
                    'accountNumber' => 'required|string|same:confirmAccountNumber',
                    'ifscCode' => 'required|string',
                ]);
                break;
        }

        // Process the donation (e.g., save to database or send email)

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}
