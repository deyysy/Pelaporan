<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas'
    ];
    public function petugas(){
        return $this->belongsTo(petugas::class, 'id_petugas', 'id_petugas');
    }
    public function pengaduan(){
        return $this->belongsTo(pengaduan::class, 'id_pengaduan' );
    }
}
