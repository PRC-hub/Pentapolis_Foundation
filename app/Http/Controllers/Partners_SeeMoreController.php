<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Partners_SeeMoreController extends Controller
{
    public function partnersSeeMore()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $partnersSeeMoreJson = file_get_contents(public_path('json/partners_seeMore.json'));
        $partnersSeeMoreData = json_decode($partnersSeeMoreJson, true);

        return view('partners_seeMore',compact('partnersSeeMoreData','header','footerData'));
    }
}