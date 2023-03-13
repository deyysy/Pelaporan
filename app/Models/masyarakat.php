<?php

namespace App\Models;
use App\Models\pengaduan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class masyarakat extends Authenticatable
{
    use HasFactory;

    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    protected $guarded = [];
}
