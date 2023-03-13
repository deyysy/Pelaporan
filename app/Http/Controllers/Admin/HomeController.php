<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\masyarakat;
use App\Models\pengaduan;
use App\Models\petugas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $petugas = petugas::all()->first();

        $petugas = petugas::all()->count();
        $masyarakat = masyarakat::all()->count();
        $proses = pengaduan::where('status', 'proses')->get()->count();
        $selesai = pengaduan::where('status', 'selesai')->get()->count();

        return view('Admin.dashboard', [
            'petugas' => $petugas,
            'masyarakat' => $masyarakat,
            'proses' => $proses,
            'selesai' => $selesai,
            'page_title' => 'Dashboard'
        ]);
    }
}
