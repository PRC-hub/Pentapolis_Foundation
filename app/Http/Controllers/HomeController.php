<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $headerJson = file_get_contents(public_path('json/header_navigation.json'));
        $header = json_decode($headerJson, true);

        $featureJson = file_get_contents(public_path('json/feature_section.json'));
        $featureSection = json_decode($featureJson, true)['featureSection'];

        $capacityJson = file_get_contents(public_path('json/capacity_building_section.json'));
        $capacityBuildingData = json_decode($capacityJson, true);

        $donationJson = file_get_contents(public_path('json/donation_section.json'));
        $donationData = json_decode($donationJson, true);

        $overviewJson = file_get_contents(public_path('json/overview_section.json'));
        $overviewData = json_decode($overviewJson, true);

        $partnersJson = file_get_contents(public_path('json/partners_clients_section.json'));
        $partnerData = json_decode($partnersJson, true);
        
        $footerJson = file_get_contents(public_path('json/footerData.json'));
        $footerData = json_decode($footerJson, true);
        
        $sectionsPath = public_path('json/sections.json');
        $sections = file_exists($sectionsPath) ? json_decode(file_get_contents($sectionsPath), true) : [];

        $achievementsPath = public_path('json/achievements.json');
        $achievements = file_exists($achievementsPath) ? json_decode(file_get_contents($achievementsPath), true) : [];

        
        $jsonPath = public_path('json/courses.json');
        $courses = json_decode(file_get_contents($jsonPath), true)['course'];

        $configPath = public_path('json/MyTalent.json');
        $config = json_decode(file_get_contents($configPath), true);

        $successPath = public_path('json/success.json');
        $success = file_exists($successPath) ? json_decode(file_get_contents($successPath), true):['success'];

        $jsonPath = public_path('json/gallery.json'); // Path to JSON file
        $gallery = json_decode(file_get_contents($jsonPath), true);
        $images = array_slice($gallery, 0, 6);

        return view('home', compact('header','images','featureSection','capacityBuildingData','donationData','overviewData','partnerData','footerData', 'sections', 'achievements','courses','config','success'));
    }
}
