<?php

namespace App\Http\Controllers\Admin;

use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{
    public function createORupdate(Request $request)
    {
        $pengaduan = pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $tanggapan = tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan) {
            $pengaduan->update(['status' => $request->status]);

            // dd($tanggapan);
            $tanggapan->update([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            
            toast('Tanggapan berhasil diUpgrade!','success');
            return redirect()->route('pengaduan.show', compact('pengaduan', 'tanggapan'));
            
        } else {
            $pengaduan->update(['status' => $request->status]);

            // dd($tanggapan);
            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            
            toast('Berhasil Memberi Tanggapan!','success');
            return redirect()->route('pengaduan.show', compact('pengaduan', 'tanggapan'));
        }
    }
}
