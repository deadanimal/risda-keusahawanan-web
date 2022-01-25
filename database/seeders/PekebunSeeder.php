<?php

namespace Database\Seeders;

use App\Models\Pekebun;
use Illuminate\Database\Seeder;

class PekebunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pekebun::create([
            'usahawanid'=> 'J00000',
            'status_daftar_usahawan'=> 'KP01',
            'Nama_PK'=> 'Tunggal',
            'No_KP'=>'1',
            'noTS'=>'1'
            
        ]);
    }
}
