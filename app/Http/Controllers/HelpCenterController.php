<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelpCenterController extends Controller
{
    public function help()
    {
        // Load announcements from JSON
        $helpJsonData = file_get_contents(public_path('json/salesperson_dashboard/help.json'));
        $helpData = json_decode($helpJsonData, true);
        
        return view('helpCenter', compact('helpData'));
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'feedback' => 'nullable|string',
        ]);

        // Process feedback (e.g., save to database, send an email, etc.)
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
