<?php

namespace App\Http\Controllers\User;

use File;
use Svg\Tag\Image;
use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function laporan($pengguna = '')
    {
        $terverifikasi = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($pengguna == 'saya') {
            $pengaduan = pengaduan::with('tanggapan', 'user')->orderBy('tgl_pengaduan', 'desc')->get();
//dd($pengaduan);
            $asdf = pengaduan::orderBy('created_at', 'desc')->simplePaginate(3);

            return view('user.laporan.index', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'pengguna' => $pengguna, 'asdf'=>$asdf]);
        } else {
            $pengaduan = pengaduan::where([['nik', '!=', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();
            $asdf = pengaduan::orderBy('created_at', 'desc')->simplePaginate(3);
            return view('user.laporan.index', compact('pengaduan', 'hitung', 'pengguna', 'asdf'));
        }
    }

    public function edit($id_pengaduan)
    {
        $pengaduan = pengaduan::find($id_pengaduan);
        // dd($pengaduan);
        return view('user.laporan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id_pengaduan)
    {
        // $pengaduan = pengaduan::find($id_pengaduan);

        $request->validate([
            // 'judul' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'nullable',
        ]);


        $d = pengaduan::findOrFail($id_pengaduan);

        $d->isi_laporan = $request->isi_laporan;

        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage
            // Storage::delete($d->foto);

            // Simpan foto baru ke storage dengan menggunakan Storage URL
            $path = $request->file('foto')->store('assets/pengaduan');
            $d->foto = $path;
        }
        $d->save();

        toast('Laporan berhasil diubah. Terima kasih!','success');
        return redirect()->route('user.laporan', $d->id_pengaduan, );
    }


    public function delete($id_pengaduan)
    {
        $data = pengaduan::findOrFail($id_pengaduan);
        $data->delete();

        return redirect()->route('user.laporan');
    }

}
