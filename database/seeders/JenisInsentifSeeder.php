<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisInsentifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisInsentif::create([
            'jenis_insentif' => 'JI01',
            'nama_insentif' => 'AET (INSENTIF START-UP INDIVIDU)',
            'status_insentif' => 'aktif'
        ]);
    }
}
