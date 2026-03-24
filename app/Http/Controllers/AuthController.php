<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Registration logic
    }

    public function login(Request $request)
    {
        // Login logic
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully.']);
    }
}