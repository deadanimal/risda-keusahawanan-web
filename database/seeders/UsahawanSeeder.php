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
            'Kod_PT'=>'423199',
            'namausahawan'=>'user1',
            'nokadpengenalan'=>'123456789012',
            'tarikhlahir'=>'23-11-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'statusperkahwinan'=>'bujang',
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
            'id_kategori_usahawan'=>'6',
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
            'Kod_PT'=>'423199',
            'namausahawan'=>'A.RAHMAN BIN ADAM',
            'nokadpengenalan'=>'600606015813',
            'tarikhlahir'=>'06-06-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'statusperkahwinan'=>'BERKAHWIN',
            'U_Pendidikan_ID'=>'3',
            'alamat1'=>'KPS 23, PTD 2172',
            'alamat2'=>'KG.SG.KUALI, SERKAT',
            'alamat3'=>'',
            'bandar'=>'PONTIAN',
            'poskod'=>'82300',
            'U_Negeri_ID'=>'02',
            'U_Daerah_ID'=>'0201',
            'U_Mukim_ID'=>'7',
            'U_Parlimen_ID'=>'02004',
            'U_Dun_ID'=>'02004001',
            'U_Kampung_ID'=>'3',
            'U_Seksyen_ID'=>'6',
            'id_kategori_usahawan'=>'6',
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
            'nokadpengenalan'=>'600606015813',
            'tarikhlahir'=>'06-06-20',
            'U_Jantina_ID'=>'1',
            'U_Bangsa_ID'=>'2',
            'statusperkahwinan'=>'BERKAHWIN',
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
            'id_kategori_usahawan'=>'6',
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
