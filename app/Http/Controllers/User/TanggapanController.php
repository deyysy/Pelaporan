<?php

namespace App\Http\Controllers\User;

use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{

    public function show($id_pengaduan)
    {
        $pengaduan = pengaduan::find($id_pengaduan);
        // $tanggapan = tanggapan::with('id_petugas')->get();

        $terverifikasi = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];
        $tanggapan = tanggapan::where('id_petugas', Auth::guard('admin')->user())->get()->count();
        // dd($pengaduan);
    //     $pengaduan = pengaduan::where('id_pengaduan', $id_pengaduan)->first();
    //     $tanggapan = tanggapan::where('id_pengaduan', $id_pengaduan)->first();
      
        return view('user.tanggapan', compact('pengaduan', 'tanggapan', 'terverifikasi', 'proses', 'selesai'));
    }
}
