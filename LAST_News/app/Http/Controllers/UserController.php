<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function registerUser()
{
    // Create a new user with a name, email, and password
    $user = User::create([
        'name' => 'John Doe', // Provide a name for the user
        'email' => 'john@example.com',
        'password' => bcrypt('password'),
    ]);

    // Assign roles and permissions to the user
    $user->assignRole('admin'); // Assign admin role
    $user->givePermissionTo('edit'); // Give 'edit' permission

    return 'User registered with roles and permissions.';
}


    public function checkRolesAndPermissions()
    {
        $user = User::find(3); // Assuming you have a user with ID 1

        // Check if the user has the 'admin' role
        if ($user->hasRole('admin')) {
            
            return 'User has the admin role.';
        } else {
            return 'User does not have the admin role.';
        }

        // Check if the user has the 'edit' permission
        if ($user->hasPermissionTo('edit')) {
            return 'User has the edit permission.';
        } else {
            return 'User does not have the edit permission.';
        }
    }
    public function deleteUser(Request $request, $userId)
    {
        // Assuming you have a 'deleted' column in your users table
        User::where('id', $userId)->update(['deleted' => 'yes']);

        return response()->json(['success' => true]);
    }
}
