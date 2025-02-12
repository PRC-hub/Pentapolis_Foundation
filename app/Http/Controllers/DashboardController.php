<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Read the JSON file
        $dashboardData = json_decode(file_get_contents(public_path('json/salesperson_dashboard/dashboard.json')), true);

        return view('index', compact('dashboardData'));
    }
    
}
