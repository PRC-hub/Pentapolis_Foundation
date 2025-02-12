<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function help()
    {
        // Load the JSON data
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);

        $helpPath = file_get_contents(public_path('json/help.json'));
        $helpData = json_decode($helpPath, true);
        
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        // Pass the data to the view
        return view('help-us', compact('helpData','footerData','header'));
    }
}
