<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalespersonLocation;
use App\Events\LocationUpdated;
use Auth;

class SalespersonLocationController extends Controller
{
    public function updateLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $location = SalespersonLocation::updateOrCreate(
            ['user_id' => Auth::id()],
            ['latitude' => $request->latitude, 'longitude' => $request->longitude]
        );

        broadcast(new LocationUpdated($location))->toOthers();

        return response()->json(['message' => 'Location updated successfully']);
    }

    public function getLocations()
    {
        return response()->json(SalespersonLocation::with('user')->get());
    }
}

