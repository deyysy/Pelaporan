<?php

namespace App\Http\Controllers\Admin;

use App\Models\petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $username = petugas::where('username', $request->username)->first();
        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);
        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            // dd("dsa");
            $request->session()->regenerate();
            return redirect()->route('dashboard');
            // return redirect()->intended('/dashboard');
        }else{
            return redirect()->back()->with('error', 'dsadasdsad');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return view('admin.auth.login');
    }
}
