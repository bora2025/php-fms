<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Simple simulation
        if ($request->email && $request->password) {
            // Simulate login
            return response()->json(['message' => 'Logged in successfully']);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        // Simulate logout
        return response()->json(['message' => 'Logged out successfully']);
    }
}
