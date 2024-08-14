<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class logincontroller extends Controller
{
    public function index()
    {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('Admin.login.login', ['pageConfigs' => $pageConfigs]);
    }
     public function login(Request $request)
     {
         // Validate the login form data
         $validatedData = $request->validate([
             'email-username' => 'required|string',
             'password' => 'required|string',
         ]);
 
         // Attempt to authenticate the user
         $credentials = [
             'email' => $validatedData['email-username'],
             'password' => $validatedData['password']
         ];
 
         if (Auth::attempt($credentials)) {
             // Authentication passed
             return redirect()->intended('/laravel/user-management'); // Redirect to intended page or default page
         } else {
             // Authentication failed
             return redirect()->back()->withErrors(['email-username' => 'Invalid credentials'])->withInput();
        
         }
     }

     public function logout(Request $request)
     {
         // Log out the user
         Auth::logout();
 
         // Invalidate the session
         $request->session()->invalidate();
 
         // Regenerate the CSRF token
         $request->session()->regenerateToken();
 
         // Redirect to the home page or login page
         return redirect('/');
     }
}
