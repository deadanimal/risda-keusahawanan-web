<?php

namespace Database\Seeders;

use App\Models\Syarikat;
use Illuminate\Database\Seeder;

class SyarikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Syarikat::create([
            'usahawanid'=> '1',
            'namasyarikat'=> 'I-Segera',
            'jenismilikanperniagaan'=> 'Tunggal',
            'nodaftarssm'=>'1',
            'nodaftarpbt'=>'123456789012',
            'nodaftarpersijilanhalal'=>'1',
            'nodaftarmesti'=>'1',
            'tahunmulaoperasi'=>'2017',
            'bilanganpekerja'=>'100',
            'alamat1_ssm'=>'1',
            'alamat2_ssm'=>'2',
            'alamat3_ssm'=>'3',
            'tarikh_mula_mof'=>'17-3-24',
            'tarikh_tamat_mof'=>'18-3-25',
            'status_bumiputera'=>'1',
            'tarikh_daftar_ssm'=>'17-3-24',
            'notelefon'=>'1',
            'no_hp'=>'1',
            'email'=>'user1@gmail.coom',
            'logo_syarikat'=>'1',
            'prefix_id'=>'1',
            'createdby_id'=>'1',
            'createdby_kod_PT'=>'1',
            'modifiedby_id'=>'1',
            'modifiedby_kod_PT'=>'1',
            
        ]);
    }
}
