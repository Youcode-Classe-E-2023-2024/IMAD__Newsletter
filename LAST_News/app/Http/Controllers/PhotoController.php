<?php

// app/Http/Controllers/PhotoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photose;

class PhotoController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos.*' => 'required|file|mimetypes:image/*,video/mp4,video/quicktime,video/x-msvideo,video/x-ms-wmv|max:50000',
        ]);

        foreach ($request->file('photos') as $photo) {
            $name = $photo->getClientOriginalName();
            $photo->storeAs('photos', $name, 'public');

            Photose::create([
                'name' => $name,
                // Add more fields as needed
            ]);
        }

        return redirect()->back()->with('success', 'Photos uploaded successfully.');
    }
}
