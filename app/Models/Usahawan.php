<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usahawan extends Model
{
    use HasFactory;

    // protected $with = ['pekebun'];

        /**
         * Get the user associated with the Pegawai
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        // public function pekebun()
        // {
        //     return $this->hasOne(Pekebun::class, 'usahawanid', 'usahawanid');
        // }
        // public function negeri()
        // {
        //     return $this->hasOne(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
        // }
        // public function PT()
        // {
        //     return $this->hasOne(PusatTanggungjawab::class, 'Kod_PT', 'Kod_PT');
        // }
        // public function daerah()
        // {
        //     return $this->hasOne(Daerah::class, 'U_Daerah_ID', 'U_Daerah_ID');
        // }
        // public function dun()
        // {
        //     return $this->hasOne(Dun::class, 'U_Dun_ID', 'U_Dun_ID');
        // }
        // public function parlimen()
        // {
        //     return $this->hasOne(Parlimen::class, 'U_Parlimen_ID', 'U_Parlimen_ID');
        // }
        // public function perniagaan()
        // {
        //     return $this->hasOne(Perniagaan::class, 'usahawanid', 'usahawanid');
        // }
        // public function kateusah()
        // {
        //     return $this->hasOne(KategoriUsahawan::class, 'id_kategori_usahawan', 'id_kategori_usahawan');
        // }
        // public function syarikat()
        // {
        //     return $this->hasOne(Syarikat::class, 'usahawanid', 'usahawanid');
        // }
        
        
}
