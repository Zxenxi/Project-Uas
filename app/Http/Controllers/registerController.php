<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class registerController extends Controller
{
    public function register()
    {
        $judul = 'silahkan daftar';

        return view('register.register', ['judul' => $judul]);
    }
    public function proses_register(Request $request)
    {
        // merequest semua data dan memberikan validasi
        $validated = Validator::make($request->all(), [

            // membuat validasi untuk masing-masing variable
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => [
                'required',
                // memberikan validasi pada password dengan ketentuan seperti minimal 9
                // huruf dan menggunakan symbol juga kapital dalam mengisi password
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ]
        ], [
            // mencustom tampilan error validasi pada masing masing variable
            'name.required' => 'Nama lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        // membuat perulangan validasi
        // jika validasi gagal maka akan memberikan pesan error dan kembali ke halaman tambah data
        if ($validated->fails()) {
            return redirect('register')
                ->withErrors($validated)
                ->withInput();

            // dan jika validasi berhasil maka akan dimasukan kedalam database dan langsung menuju ke halaman utama(users)
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = bcrypt($request->input('password'));

            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => $password,
                'created_at' => date('Y-m-d H:i:s'),
                'remember_token' => Str::random(60)
            ]);
            // mereturn ke halaman users dan pesan berhasil 
            return redirect('/login')->with('berhasil', 'Data pengguna berhasil disimpan');
        }
    }
}
// return redirect('login')->with('anda berhasil mendaftar');