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
            'usahawanid'=> 'J00000',
            'jenisperniagaan'=> 'A',
            'klusterperniagaan'=> 'Tunggal',
            'subkluster'=>'1',
            'alamat1'=>'1',
            'alamat2'=>'2',
            'alamat3'=>'3',
            'bandar'=>'petaling',
            'poskod'=>'46000',
            'U_Negeri_ID'=>'01',
            'U_Daerah_ID'=>'0101',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'01140',
            'U_Dun_ID'=>'01140001',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
            'latitud'=>'1',
            'logitud'=>'1',
            'facebook'=>'user1@gmail.coom',
            // 'logo_syarikat'=>'1',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'1',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'1',
            
        ]);

        Perniagaan::create([
            'usahawanid'=> '2',
            'jenisperniagaan'=> 'B',
            'klusterperniagaan'=> 'Tunggal',
            'subkluster'=>'1',
            'alamat1'=>'1',
            'alamat2'=>'2',
            'alamat3'=>'3',
            'bandar'=>'petaling',
            'poskod'=>'46000',
            'U_Negeri_ID'=>'02',
            'U_Daerah_ID'=>'0201',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'02004',
            'U_Dun_ID'=>'02004001',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
            'latitud'=>'1',
            'logitud'=>'1',
            'facebook'=>'user1@gmail.coom',
            // 'logo_syarikat'=>'1',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'1',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'1',
            
        ]);

        Perniagaan::create([
            'usahawanid'=> '3',
            'jenisperniagaan'=> 'C',
            'klusterperniagaan'=> 'Tunggal',
            'subkluster'=>'1',
            'alamat1'=>'1',
            'alamat2'=>'2',
            'alamat3'=>'3',
            'bandar'=>'petaling',
            'poskod'=>'46000',
            'U_Negeri_ID'=>'02',
            'U_Daerah_ID'=>'0201',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'02004',
            'U_Dun_ID'=>'02004001',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
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
