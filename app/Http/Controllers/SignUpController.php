<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class SignUpController extends Controller
{
    // Display the signup page
    public function show()
    {
        // Load the JSON file
        $signUpJson = public_path('json/signup.json');
        $signUpData = json_decode(file_get_contents($signUpJson), true);

        // Render the signup view with the JSON data
        return view('signup', compact('signUpData'));
    }

    // Handle form submission
    public function register(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'user_type' => 'required|string|in:Student,Employee,Customer,Admin,Trainer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'otp' => 'required|digits:6',
            'terms' => 'required|in:1',
        ]);


        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
  
        // Store user in database
        User::create([
            'user_type' => $request->user_type,
            'email' => $request->email,
            'name' => null,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Registration successful!');
       
    }
}