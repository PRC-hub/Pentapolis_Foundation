<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanitarianController extends Controller
{
    public function humanitarian()
    {
        // Load JSON data
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);

        $jsonFile = public_path('json/humanitarian.json');
        $humanitarianData = json_decode(file_get_contents($jsonFile), true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        // Pass data to the view
        return view('humanitarian', compact('humanitarianData','footerData','header'));
    }
}
