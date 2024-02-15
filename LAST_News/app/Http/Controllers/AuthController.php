<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    // Register
    public function create(Request $request)
    {
        
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        
        $user->assignRole('user');
        // Issue a token
        $token = $user->createToken('token-name')->plainTextToken;

        // Redirect back to registration form with a success message
        return redirect()->route("welcome")->with('status', 'Registration successful. You can now log in.');
    }



   

    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication passed
            // Issue a token if using Sanctum
            $token = auth()->user()->createToken('token-name')->plainTextToken;

            return response()->json(['token' => $token, 'user' => auth()->user()]);
        }

        // Authentication failed
        return response()->json(['message' => 'Invalid login credentials'], 401);
    }


}
