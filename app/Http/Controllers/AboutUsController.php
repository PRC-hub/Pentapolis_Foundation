<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs(){
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $aboutUsPath = public_path('json/aboutUs.json');
        $data= json_decode(file_get_contents($aboutUsPath), true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        return view('about-us',compact('data','footerData','header'));
    }
}
