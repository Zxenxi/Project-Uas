<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class sessionController extends Controller
{
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}