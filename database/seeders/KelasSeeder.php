<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'XII';
        $sedkelas->nama_rayon = 'Ciawi 1';
        $sedkelas->kompetensi_keahlian = 'Rekayasa Perangkat Lunak';
        $sedkelas->save();

        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'XI';
        $sedkelas->nama_rayon = 'Ciawi 2';
        $sedkelas->kompetensi_keahlian = 'Teknik Komputer Dan Jaringan';
        $sedkelas->save();

        $sedkelas = new Kelas();
        $sedkelas->nama_kelas = 'X';
        $sedkelas->nama_rayon = 'Ciawi 3';
        $sedkelas->kompetensi_keahlian = 'Multimedia';
        $sedkelas->save();
    }
}
