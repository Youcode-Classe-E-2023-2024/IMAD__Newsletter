<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function createRole(Request $request)
    {
        
      
        $roleName = $request->input('roleName');
        $permissions = $request->input('permissions');

        // Create new role
        $role = Role::create(['name' => $roleName]);

        // Assign permissions to the role
        $role->syncPermissions($permissions);
        
        return response()->json(['message' => 'Role created successfully']);
        
    }
    public function getRolePermissions(Request $request)
    {
        $selectedRole = $request->input('role');
        $role = Role::where('name', $selectedRole)->first();

        if ($role) {
            $permissions = $role->permissions()->pluck('name')->toArray();

            return response()->json(['permissions' => $permissions]);
        }

        return response()->json(['error' => 'Role not found'], 404);
    }
    public function assignrole(Request $request)
    {
        $selectedRole = $request->input('role');
        $id = $request->input('id');
       
        $user = User::find($id);
        $user->assignRole("$selectedRole");

        return response()->json(['message' => 'Role created successfully']);
    }
}
