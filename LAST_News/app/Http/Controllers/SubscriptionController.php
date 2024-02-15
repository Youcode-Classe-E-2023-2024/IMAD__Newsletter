<?php

// app/Http/Controllers/SubscriptionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|unique:receivers',
        ]);

        Receiver::create([
            'email' => $request->input('email'),
        ]);

        return response()->json(['message' => 'Subscription successful'], 200);
    }
}
