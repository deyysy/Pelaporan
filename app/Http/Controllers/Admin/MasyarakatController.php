<?php

namespace App\Http\Controllers\Admin;

use App\Models\pengaduan;
use App\Models\masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->has('query'))
        {
            $page_title = 'masyarakat';
            $query = $request->input('query');
            $masyarakat = masyarakat::where('nama', 'LIKE', "%$query%")->get();
            return view('admin.masyarakat.index', compact('masyarakat', 'query', 'page_title'));
        } else {
            $page_title = 'masyarakat';
            $masyarakat = masyarakat::orderBy('nik', 'desc')->get();
            return view('admin.masyarakat.index', compact('masyarakat', 'page_title'));
        }
    }

    public function show($nik)
    {
        
        $terverifikasi = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        $masyarakat = masyarakat::where('nik', $nik)->first();
        return view('admin.masyarakat.show', compact('masyarakat', 'terverifikasi', 'proses', 'selesai', 'hitung'));
    }
}
