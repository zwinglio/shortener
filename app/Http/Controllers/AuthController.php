<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (): \Illuminate\Contracts\View\View
    {
        return view('login');
    }

    public function authenticate (Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout (Request $request): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard (): \Illuminate\Contracts\View\View
    {
        //get all links
        $links = Link::where('user_id', auth()->user()->id)->get();

        return view('dashboard', compact('links'));
    }
}
