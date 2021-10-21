<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name'=> 'user1',
            'email'=> 'user1@gmail.com',
            'password'=> Hash::make('password'),
            'usahawanid'=>'1',
            'no_kp'=>'123456789012',
            'status_pengguna'=>'1'
            
        ]);

        User::create([
            'name'=> 'A.RAHMAN BIN ADAM',
            'email'=> 'a.rahmanadam@yahoo.com',
            'password'=> Hash::make('password'),
            'usahawanid'=>'2',
            'no_kp'=>'600606015813',
            'status_pengguna'=>'1'
            
        ]);

        User::create([
            'name'=> 'user4',
            'email'=> 'user4@gmail.com',
            'password'=> Hash::make('password'),
            'usahawanid'=>'5',
            'no_kp'=>'123456789015',
            'status_pengguna'=>'1'
            
        ]);

        User::create([
            'name'=> 'RUZLAN BIN ABDUL RAHMAN',
            'email'=> 'ruzlan@risda.gov.my',
            'password'=> Hash::make('password'),
            'idpegawai'=>'1',
            'no_kp'=>'123456789015',
            'status_pengguna'=>'1'
        ]);

        User::create([
            'name'=> 'ABD ZAHID BIN HAJI AHMAD',
            'email'=> 'abdzahid@risda.gov.my',
            'password'=> Hash::make('password'),
            'idpegawai'=>'2',
            'no_kp'=>'670210000000',
            'status_pengguna'=>'1'
        ]);

        User::create([
            'name'=> 'ABDUL HALIM BIN ABU HASSAN',
            'email'=> 'a.halim@risda.gov.my',
            'password'=> Hash::make('password'),
            'idpegawai'=>'3',
            'no_kp'=>'700510000000',
            'status_pengguna'=>'1'
        ]);


        User::create([
            'name'=> 'MAHANUM BT MAT RIPING',
            'email'=> 'mahanum@risda.gov.my',
            'password'=> Hash::make('password'),
            'idpegawai'=>'4',
            'no_kp'=>'700510000000',
            'status_pengguna'=>'1'
        ]);
    }
}
