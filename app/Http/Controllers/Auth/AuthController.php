<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login_page()
    {
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        function generate_string($input, $strength = 5)
        {
            $input_length = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            return $random_string;
        }

        $string_length = 6;
        $captcha_string = generate_string($permitted_chars, $string_length);

        if (Auth::guard('admin')->check())
            return redirect()->route('admin.index');
        elseif (Auth::guard('user')->check())
            return "-";

        return view('auth.login', ['captcha' => $captcha_string]);
    }

    public function login_progress(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required',
                'captcha' => 'required',
                'captcha_v' => 'required',
            ]);

        if ($request->captcha !== $request->captcha_v) {
            return back();
        }

        $remember = ($request->remember) ? true : false;

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('admin.index');
        } elseif (Auth::guard('user')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check())
            Auth::guard('admin')->logout();
        elseif (Auth::guard('user')->check())
            Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
