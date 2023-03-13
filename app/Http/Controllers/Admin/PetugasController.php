<?php

namespace App\Http\Controllers\Admin;

use App\Models\petugas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::orderBy('id_petugas', 'desc')->get();
        $page_title = 'petugas';

        return view('admin.petugas.index', compact('petugas', 'page_title'));
    }

    public function create()
    {
        $page_title = 'petugas';
        return view('admin.petugas.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:35'],
            'username' => ['required', 'string', 'unique:petugas'],
            'password' => ['required', 'string', 'min:8', ],
            'telp' => ['required', 'string', 'unique:petugas'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $username = petugas::where('username', $data['username'])->first();
        if ($username) {
            return redirect()->back()->with(['username' => 'Username sudah digunakan!']);
        }

        $telp = petugas::where('telp', $request->telp)->first();
        if ($telp) {
            return redirect()->back()->with(['pesan' => 'No Telp sudah terdaftar!']);
        } 

        petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        toast('Selamat! Petugas baru telah berhasil ditambahkan ke sistem','success');
        return redirect()->route('petugas.index');
    }

    public function edit($id_petugas)
    {
        $petugas = petugas::where('id_petugas', $id_petugas)->first();
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();
        $petugas = petugas::find($id_petugas);

        $username = petugas::where('username', $request->username)->first();
        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        } 

        $telp = petugas::where('telp', $request->telp)->first();
        if ($telp) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        } 

        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        toast('Upgrade telah berhasil dilakukan!','success');
        return redirect()->route('petugas.index');
    }

    public function destroy($id_petugas)
    {
        $petugas = petugas::findOrFail($id_petugas);
        $petugas->delete();

        toast('Akun petugas telah dihapus secara permanen dari sistem !','success');
        return redirect()->route('petugas.index', compact('petugas'));
    }
}
