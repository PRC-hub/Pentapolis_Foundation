<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{


    public function loadMore()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        $jsonPath = public_path('json/images.json'); 
        $images = File::exists($jsonPath) ? json_decode(File::get($jsonPath), true) : [];

        return view('gallery', compact('images','header','footerData'));
    }
}
