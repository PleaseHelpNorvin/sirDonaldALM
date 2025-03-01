<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AuthController extends Controller
{
    // Show landing page
    public function landingView()
    {
        return view('landing_pages.landing');
    }

    // Show registration page
    public function registerView()
    {
        return view('landing_pages.register');
    }

    // Show login page
    public function loginView()
    {
        return view('landing_pages.login');
    }

    // Handle login
    public function authenticate(Request $request) 
    {   
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'], // Ensure email exists
            'password' => ['required', 'min:6'],
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'No account found with this email.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.view')->with('success', 'Login successful!');
        }
    
        return back()
            ->withErrors(['email' => 'Invalid credentials.'])
            ->withInput();
    }

    
    public function register(Request $request) 
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required', 
                'min:8', 
                'confirmed', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
        ], [
            'name.required' => 'Full name is required.',
            'name.regex' => 'Full name can only contain letters and spaces.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Passwords do not match.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        $user = User::create([
            'name' => trim($validated['name']),
            'email' => trim($validated['email']),
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.view')->with('success', 'Registration successful!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.view')->with('success', 'Logged out successfully.');
    }
}