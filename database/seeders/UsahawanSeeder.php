<?php

namespace Database\Seeders;

use App\Models\Usahawan;
use Illuminate\Database\Seeder;

class UsahawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usahawan::create([
            'Kod_PT'=>'427199',
            'namausahawan'=>'user1',
            'usahawanid'=>'J00000',
            'nokadpengenalan'=>'970203085559',
            'tarikhlahir'=>'23-11-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'statusperkahwinan'=>'1',
            'U_Pendidikan_ID'=>'3',
            'alamat1'=>'alamat 1',
            'alamat2'=>'alamat 2',
            'alamat3'=>'alamat 3',
            'bandar'=>'shah alam',
            'poskod'=>'34000',
            'U_Negeri_ID'=>'01',
            'U_Daerah_ID'=>'0101',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'01140',
            'U_Dun_ID'=>'01140001',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
            'id_kategori_usahawan'=>'KU01',
            // 'gambar_url'=>'user1',
            'notelefon'=>'0987654321',
            'nohp'=>'1234567890',
            'email'=>'user1@gmail.com',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'2',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'2',
        ]);

        Usahawan::create([
            'Kod_PT'=>'427199',
            'namausahawan'=>'A.RAHMAN BIN ADAM',
            'usahawanid'=>'J00001',
            'nokadpengenalan'=>'600606015813',
            'tarikhlahir'=>'06-06-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'U_Etnik_ID'=>'2111',
            'statusperkahwinan'=>'2',
            'U_Pendidikan_ID'=>'3',
            'U_Taraf_Pendidikan_Tertinggi_ID'=>'1',
            'alamat1'=>'KPS 23, PTD 2172',
            'alamat2'=>'KG.SG.KUALI, SERKAT',
            'alamat3'=>'TEST3',
            'bandar'=>'PONTIAN',
            'poskod'=>'82300',
            'U_Negeri_ID'=>'02',
            'U_Daerah_ID'=>'0201',
            'U_Mukim_ID'=>'020101',
            'U_Parlimen_ID'=>'02004',
            'U_Dun_ID'=>'02004001',
            'U_Kampung_ID'=>'020101001',
            'U_Seksyen_ID'=>'10101000',
            'id_kategori_usahawan'=>'KU01',
            // 'gambar_url'=>'user1',
            'notelefon'=>'0987654321',
            'nohp'=>'1234567890',
            'email'=>'a.rahmanadam@yahoo.com',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'2',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'2',
        ]);

        Usahawan::create([
            'Kod_PT'=>'1',
            'namausahawan'=>'user4',
            'usahawanid'=>'J00002',
            'nokadpengenalan'=>'600606015813',
            'tarikhlahir'=>'06-06-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'statusperkahwinan'=>'3',
            'U_Pendidikan_ID'=>'3',
            'alamat1'=>'KPS 23, PTD 2172',
            'alamat2'=>'KG.SG.KUALI, SERKAT',
            'alamat3'=>'',
            'bandar'=>'PONTIAN',
            'poskod'=>'82300',
            'U_Negeri_ID'=>'02',
            'U_Daerah_ID'=>'0103',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'02004',
            'U_Dun_ID'=>'02004002',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
            'id_kategori_usahawan'=>'KU03',
            // 'gambar_url'=>'user1',
            'notelefon'=>'0987654321',
            'nohp'=>'1234567890',
            'email'=>'a.rahmanadam@yahoo.com',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'2',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'2',
        ]);
    }
}
