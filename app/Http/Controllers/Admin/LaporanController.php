<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $page_title = 'laporan';
        return view('admin.laporan.index', compact('page_title'));
    }

    public function  getlaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        return view('admin.laporan.index', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to]);
    }

    public function generatePDF($from, $to)
    {
        $pengaduan = pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        $pdf = PDF::loadView('Admin.Laporan.generate', ['pengaduan' => $pengaduan]);

        return $pdf->download('Laporan.pdf');
    }

}
