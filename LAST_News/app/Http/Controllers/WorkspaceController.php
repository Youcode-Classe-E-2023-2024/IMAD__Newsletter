<?php

// app/Http/Controllers/WorkspaceController.php

namespace App\Http\Controllers;
use App\Models\Photose;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        
        
        $photoNames = Photose::pluck('name');

        return view('Workspace', compact('photoNames'));
    }
}
