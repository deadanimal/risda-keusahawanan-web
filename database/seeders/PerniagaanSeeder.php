<?php

namespace Database\Seeders;

use App\Models\Perniagaan;
use Illuminate\Database\Seeder;

class PerniagaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perniagaan::create([
            'usahawanid'=> '1',
            'jenisperniagaan'=> 'Tunggal',
            'klusterperniagaan'=> 'Tunggal',
            'subkluster'=>'1',
            'alamat1'=>'1',
            'alamat2'=>'2',
            'alamat3'=>'3',
            'bandar'=>'petaling',
            'poskod'=>'46000',
            'U_Negeri_ID'=>'1',
            'U_Daerah_ID'=>'2',
            'U_Mukim_ID'=>'3',
            'U_Parlimen_ID'=>'1',
            'U_Dun_ID'=>'18-3-25',
            'U_Kampung_ID'=>'1',
            'U_Seksyen_ID'=>'1',
            'latitud'=>'1',
            'logitud'=>'1',
            'facebook'=>'user1@gmail.coom',
            // 'logo_syarikat'=>'1',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'1',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'1',
            
        ]);
    }
}
