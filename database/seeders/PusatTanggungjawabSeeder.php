<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PusatTanggungjawab;

class PusatTanggungjawabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PusatTanggungjawab::truncate();
  
        $csvFile = fopen(base_path("database/data/Pusat_Tanggungjawab.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                PusatTanggungjawab::create([
                    "Kod_PT" => $data['0'],
                    "Bahagian_ID" => $data['1'],
                    "Negeri_Rkod" => $data['2'],
                    "keterangan" => $data['3'],
                    "status" => $data['4']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
