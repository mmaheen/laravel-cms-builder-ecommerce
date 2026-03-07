<?php

namespace App\Http\Controllers;

use App\Models\RegistrationToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function createToken()
    {
        // Generate a random slug
        $slug = Str::random(30);

        // Save token in DB
        $token = RegistrationToken::create(['token' => $slug]);

        // Build the link properly
        $link = url($token->token . '/register');

        return $link; // you can return, echo, or email this link
    }

    public function showRegistrationForm($token)
    {
        $record = RegistrationToken::where('token', $token)
            ->where('used', false)
            ->first();
        if (!$record) {
            abort(404, 'Invalid or already used registration link.');
        }

        return view("auth.register", compact("record"));
    }
    public function register(Request $request, $token)
    {
        // return $token;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:1|confirmed',
        ]);

        // return $data["name"];
        try {
            User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],
            ]);
            $record = RegistrationToken::where("token", $token)->firstOrFail();
            $record->update(['used' => true]);
            return redirect()->route('home')->with('success', 'User Created Successfully');
        } catch (\Exception $e) {
            return back()->with("error", "Something went wrong" . $e->getMessage());
        }





    }
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:1',
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout(); // logs out the user

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token for security
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');

    }
}
