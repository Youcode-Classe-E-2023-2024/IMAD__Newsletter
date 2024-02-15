<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has the "administration" permission
     
            if (auth()->user()->hasPermissionTo('administration')) {
                // Retrieve permissions, roles, and users
                $permissions = Permission::pluck('name');
                $roles = Roles::pluck('name');
                // $users = User::All();
                $users = User::where('deleted', '!=', 'yes')->get();

                // Debug: Display user permissions
                

                return view('Management', compact('permissions', 'roles', 'users'));
            } else {
                // Redirect if the user doesn't have the "Administration" permission
                return redirect()->route('some.other.route');
            }
        } else {
            // Redirect if the user is not authenticated
            return redirect()->route('login');
        }
    }
}
