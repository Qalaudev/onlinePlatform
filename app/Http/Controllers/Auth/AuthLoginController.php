<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;


use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {

        if (Auth::check()) {
            return redirect()->intended('/course');
        }
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $user = Auth::user();
            if($user['name'] === 'admin')
            {
                return redirect()->intended('/personal');
            }
            else{
                return redirect()->intended('/course');
            }
        }
        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
