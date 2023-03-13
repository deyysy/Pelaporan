<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status'
    ];
    protected $dates = ['tgl_pengaduan'];

    public function user()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }
    public function tanggapan(){
        return $this->belongsTo(tanggapan::class, 'tgl_tanggapan');
    }
    public function petugas(){
        return $this->belongsTo(petugas::class, 'nama_petugas', 'id_petugas');
    }
}
