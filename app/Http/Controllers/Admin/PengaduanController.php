<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = pengaduan::orderBy('tgl_pengaduan', 'desc')->paginate(10);
        $page_title = 'pengaduan';
        return view('admin.pengaduan.index', compact('pengaduan',  'page_title'));
    }

    public function show($id_pengaduan)
    {
        $page_title = 'pengaduan';
        $pengaduan = pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = tanggapan::where('id_pengaduan', $id_pengaduan)->first();
      
        return view('admin.pengaduan.show', compact('pengaduan', 'tanggapan', 'page_title'));
    }
}
