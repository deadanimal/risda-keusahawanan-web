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
            'name'=> 'user2',
            'email'=> 'user2@gmail.com',
            'password'=> Hash::make('password'),
            'idpegawai'=>'2',
            'no_kp'=>'123456789013',
            'status_pengguna'=>'1'
            
        ]);

        User::create([
            'name'=> 'user3',
            'email'=> 'user3@gmail.com',
            'password'=> Hash::make('password'),
            'idpegawai'=>'4',
            'no_kp'=>'123456789014',
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
    }
}
