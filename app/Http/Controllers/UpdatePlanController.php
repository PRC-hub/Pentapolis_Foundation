<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpdatePlanController extends Controller
{
    public function showSales()
    {
        $path = storage_path('app/sales.json');
        $salesUpdates = File::exists($path) ? json_decode(File::get($path), true) : [];
        
        return view('updatePlan', compact('salesUpdates'));
    }

    public function updateSales(Request $request)
    {
        $request->validate([
            'salesActivity' => 'required|string',
            'salesTarget' => 'required|integer|min:1'
        ]);

        $path = storage_path('app/sales.json');
        $salesUpdates = File::exists($path) ? json_decode(File::get($path), true) : [];

        $newUpdate = [
            'salesActivity' => $request->input('salesActivity'),
            'salesTarget' => $request->input('salesTarget'),
            'date' => now()->toDateString(),
            'time' => now()->toTimeString()
        ];

        array_unshift($salesUpdates, $newUpdate);
        File::put($path, json_encode($salesUpdates, JSON_PRETTY_PRINT));

        return response()->json(['success' => true]);
    }
}
