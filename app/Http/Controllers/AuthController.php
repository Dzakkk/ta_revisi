<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function home()
    {
        return view('landing_page');
    }

    public function loginform() {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ], [
            'nip.required' => 'isi nik',
            'password.required' => 'isi password',
        ]);

        $infologin = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'pegawai') {
                return redirect('/pegawai/dashboard');
            } elseif (Auth::user()->role == 'petugas') {
                return redirect('/petugas/dashboard');
            } elseif (Auth::user()->role == 'kepala_sekolah') {
                return redirect('some/url');
            }
        } else {
            return redirect('/login')->withErrors('NIP atau Password anda salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
