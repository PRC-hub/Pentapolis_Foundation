<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function show()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $jsonFile = public_path('json/privacyPolicy.json');
        $privacyPolicy = json_decode(file_get_contents($jsonFile), true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        return view('privacy', compact('privacyPolicy','footerData','header'));
    }
}
