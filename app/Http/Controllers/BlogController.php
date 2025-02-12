<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Load the JSON file
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);

        $blogJson = public_path('json/blogs.json');
        $blogsData = json_decode(file_get_contents($blogJson), true);

        // Pass the blog data to the view
        return view('blog', compact('blogsData','header','footerData'));
    }
}
