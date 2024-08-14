<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email:rfc,dns', 
                    'max:255',
                    'unique:users',
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8', 
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[!@#$%^&*(),.?":{}|<>]/', 
                ],
                'phone_number' => 'nullable|string|max:255',
                'gender' => 'required|string|in:M,F', 
                'username' => 'nullable|string|max:255|unique:users',
                'phone_verified' => 'boolean',
                'is_verified' => 'boolean',
                'image' => 'nullable|string|max:255',
            ]);

            // Create the user
            $user = User::create([
                'fullname' => $validatedData['fullname'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone_number' => $validatedData['phone_number'] ?? null,
                'gender' => $validatedData['gender'],
                'username' => $validatedData['username'] ?? null,
                'phone_verified' => $validatedData['phone_verified'] ?? false,
                'is_verified' => $validatedData['is_verified'] ?? false,
                'image' => $validatedData['image'] ?? null,
            ]);

            // Create the authentication token for the user
            $token = $user->createToken('auth_token')->plainTextToken;

            // Return success response with the auth token
            return response()->json([
                'message' => 'User registered successfully',
                'result' => [
                    'id' => $user->id,
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'phone_number' => $user->phone_number,
                    'gender' => $user->gender,
                    'username' => $user->username,
                    'phone_verified' => $user->phone_verified,
                    'is_verified' => $user->is_verified,
                    'image' => $user->image,
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ]
            ], 201);
        } catch (ValidationException $e) {
            // Return validation errors
            return response()->json([
                'message' => $e->errors(),
                'result' => false,
            ], 422);
        }
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Login failed',
                'result' => false,
            ], 401);
        }
    
        // Get the authenticated user
        $user = $request->user();
    
        // Check if the user is blocked
        if ($user->is_blocked) {
            return response()->json([
                'message' => 'Your account is blocked',
                'result' => false,
            ], 403);
        }
    
        // Generate a new token
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Return the successful login response with user details and token
        return response()->json([
            'message' => 'Login successful',
            'result' => [
                'id' => $user->id,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'gender' => $user->gender,
                'username' => $user->username,
                'phone_verified' => $user->phone_verified,
                'is_verified' => $user->is_verified,
                'image' => $user->image,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]
        ]);
    }
    

    public function profile(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Unauthorized',
                'result' => false,
            ], 401);
        }

        $user = $request->user();

        return response()->json([
            'message' => 'Profile fetched successfully',
            'result' => [
                'id' => $user->id,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'gender' => $user->gender,
                'username' => $user->username,
                'phone_verified' => $user->phone_verified,
                'is_verified' => $user->is_verified,
                'image' => $user->image,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Unauthorized',
                'result' => false,
            ], 401);
        }

        $user = $request->user();
        $user->tokens()->delete(); 

        return response()->json([
            'message' => 'Logged out successfully',
            'result' => true
        ]);
    }

    public function checkUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255'
        ]);

        $isAvailable = !User::where('username', $request->username)->exists();

        return response()->json([
            'message' => $isAvailable ? 'Username is available' : 'Username is already taken',
            'result' => $isAvailable
        ]);
    }

    public function updateUsername(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'username' => 'required|string|max:255|unique:users',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'result' => false,
            ], 404);
        }

        $user->username = $request->username;
        $user->save();

        return response()->json([
            'message' => 'Username updated successfully',
            'result' => [
                'id' => $user->id,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'gender' => $user->gender,
                'username' => $user->username,
                'phone_verified' => $user->phone_verified,
                'is_verified' => $user->is_verified,
                'image' => $user->image,
            ]
        ]);
    }
}
