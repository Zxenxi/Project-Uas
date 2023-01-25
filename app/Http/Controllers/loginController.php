<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    public function ok()
    {
        $data = DB::table('task')
            ->paginate();
        return view('home.dashboard', ['data' => $data]);
    }
    public function index()
    {
        return view('login.login');
    }
    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()

                ->intended('/dashboard')
                ->with('berhasil, Selamat Datang!');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah, silahkan coba lagi',
            ])->onlyInput('email');
    }
}