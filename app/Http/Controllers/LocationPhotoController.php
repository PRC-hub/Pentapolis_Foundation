<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LocationPhoto;

class LocationPhotoController extends Controller
{
    public function index()
    {
        $photos = LocationPhoto::latest()->get();
        $dashBoardJson = file_get_contents(public_path('json/salesperson_dashboard/dashboard.json'));
        $dashboardData = json_decode($dashBoardJson, true);
        return view('locationPhotos', compact('photos','dashboardData'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/location_photos', $fileName);

            $photo = LocationPhoto::create([
                'file_name' => $fileName,
                'description' => $request->input('description')
            ]);

            return response()->json([
                'success' => true,
                'photo_url' => asset('storage/location_photos/' . $fileName),
                'description' => $photo->description
            ]);
        }

        return response()->json(['success' => false]);
    }
}
