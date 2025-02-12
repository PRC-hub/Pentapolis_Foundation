<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        // Load the default active type from a JSON file or set a default
        $jsonFile = public_path('json/user_types.json');
        $activeType = json_decode(file_get_contents($jsonFile), true)['default'] ?? 'Student';

        return view('login', compact('activeType'));
    }
    public function login_post (Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required|in:Student,Employee,Customer,Admin,Trainer', // Ensure valid user type
        ]);
        $user = \App\Models\User::where('email', $request->email)
        ->where('user_type', $request->user_type) // Make sure user type matches
        ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            // Authenticate the user
            $remember = $request->has('remember');
            Auth::login($user, $remember);
            $request->session()->regenerate();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => route('home')
            ]);
        }
    

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password'
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
