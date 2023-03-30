<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\spp;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sedspp = new spp();
        $sedspp->tahun = '2023';
        $sedspp->id_bulan = '12';
        $sedspp->nominal = '500000';
        $sedspp->save();

        $sedspp = new spp();
        $sedspp->tahun = '2022';
        $sedspp->id_bulan = '12';
        $sedspp->nominal = '500000';
        $sedspp->save();

        $sedspp = new spp();
        $sedspp->tahun = '2021';
        $sedspp->id_bulan = '12';
        $sedspp->nominal = '400000';
        $sedspp->save();
    }
}
