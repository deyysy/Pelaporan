<?php

namespace Database\Seeders;

use App\Models\petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        petugas::truncate();
        petugas::create([
            'nama_petugas' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'telp' => '087654321',
            'level' => 'admin'
        ]);
    }
}
