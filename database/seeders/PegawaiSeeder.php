<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nama' => 'Raihan Hammam',
            'golongan' => '1',
            'gaji_pokok' => $this->hitunggajipokok('1'),
            'alamat' => 'Jl.Kenangka No.56',
            'tgl_lahir' => '1990-07-01',
            'tgl_masuk' => '2022-01-05'

        ]);
    }

    private function hitunggajipokok($golongan){
        switch ($golongan) {
            case '1':
                return 1500000;
            case '2':
                return 1000000;
            case '3':
                return 500000;
            default:
                return 0; // atau bisa throw exception jika golongan tidak valid
        }
    } 
}
