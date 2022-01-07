<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Negeri;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negeri::truncate();
  
        $csvFile = fopen(base_path("database/data/Negeri.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Negeri::create([
                    "U_Negeri_ID" => $data['0'],
                    "Negeri" => $data['1'],
                    "Kod_Negeri" => $data['2'],
                    "Negeri_Rkod" => $data['3'],
                    "status" => $data['4'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
