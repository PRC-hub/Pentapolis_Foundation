<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceDeliveryController extends Controller
{
    public function serviceDelivery()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);

        $jsonFile = public_path('json/serviceDelivery.json');
        $sectionsData = json_decode(file_get_contents($jsonFile), true);
    
        $footerJson = public_path('json/footerData.json');
        $footerData = json_decode(file_get_contents($footerJson), true);
    
        return view('service', [
            'sectionsData' => $sectionsData,
            'footerData' => $footerData,
            'header' => $header
        ]);
    }
}
