<?php

namespace App\Http\Controllers\User;

use App\Models\pengaduan;
use App\Models\tanggapan;
use App\Models\masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $pengaduan = pengaduan::all()->count();
        return view('user.landing', compact('pengaduan'));
    }

    public function FormLog()
    {
        return view('User.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $username = masyarakat::where('username', $request->username)->first();
        if (!$username) {
            toast('Username tidak terdaftar','info');
            return redirect()->back();
        }

        $password = Hash::check($request->password, $username->password);
        if (!$password) {
            toast('Password tidak sesuai','info');
            return redirect()->back();
        }

        if (Auth::guard('masyarakat')->attempt([
            'username' => $request->username, 
            'password' => $request->password
        ])) {
            return redirect()->route('user.laporan');
        } else {
            toast('Akun tidak terdaftar','info');
            return redirect()->back();
        }
    }

    public function Formregister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nik' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = masyarakat::where('username', $request->username)->first();
        if ($username) {
            toast('Username sudah terdaftar','info');
            return redirect()->back();
        } 

        masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('user.landing');
            
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        return redirect('/');
    }

    public function StorePengaduan(Request $request)
    {
        if (!Auth::guard('masyarakat')->user()) {
            // toast('Login dibutuhkan','info');
            return redirect()->back()->with(['pesan' => 'Login diButuhkan'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan' => $data['isi_laporan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0'
        ]);

        if ($pengaduan) {
            toast('Laporan Anda berhasil dikirim. Terima kasih!','success');
            return redirect()->route('user.laporan', 'saya');
        } else {
            // toast('Gagal terkirim','danger');
            return redirect()->back()->with('danger', 'Data berhasil dikirim. Terima kasih!');
        };
    }
}

    


