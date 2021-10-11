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
            'usahawanid'=> '1',
            'status_daftar_usahawan'=> 'Tunggal',
            'Nama_PK'=> 'Tunggal',
            'No_KP'=>'1',
            'Tsmohon_No'=>'1',
            'No_Geran'=>'2',
            'No_Lot'=>'3',
            
            'U_Negeri_ID'=>'1',
            'U_Daerah_ID'=>'2',
            'U_Mukim_ID'=>'3',
            'U_Parlimen_ID'=>'1',
            'U_Dun_ID'=>'18-3-25',
            'U_Kampung_ID'=>'1',
            'U_Seksyen_ID'=>'1',
            'keluasan_hektar'=>'1',
            'jenis_tanaman_kebun'=>'1',
            
        ]);
    }
}
