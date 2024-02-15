<?php
// app/Http/Controllers/CustomAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;





class CustomAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('custom_register');
    }

    public function register(Request $request)
    {
        // Validation logic
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // Assign role to the user (assuming 'user' is the role name)
       

        // You can add additional logic (e.g., login the user) if needed

        return redirect()->route('custom.login')->with('status', 'Registration successful!');
    }
}
