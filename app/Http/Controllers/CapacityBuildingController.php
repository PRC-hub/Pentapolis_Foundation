<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapacityBuildingController extends Controller
{
    public function capacity()
    {
        // Load JSON data
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $jsonFile = public_path('json/capacity.json');
        $capacityData = json_decode(file_get_contents($jsonFile), true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        // Pass data to the view
        return view('capacity', compact('capacityData','footerData','header'));
    }
}
