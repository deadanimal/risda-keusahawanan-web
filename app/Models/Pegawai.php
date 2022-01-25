<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $with = ['user', 'Negeri', 'Daerah'];

        /**
         * Get the user associated with the Pegawai
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function user()
        {
            return $this->hasOne(User::class, 'idpegawai', 'id');
        }
        public function Negeri()
        {
            // return $this->hasOne(Mukim::class, 'U_Mukim_ID', 'mukim');
            return $this->hasOneThrough(
                Negeri::class,
                Mukim::class,
                'U_Mukim_ID', // Foreign key on the cars table...
                'U_Negeri_ID', // Foreign key on the owners table...
                'mukim', // Local key on the mechanics table...
                'U_Negeri_ID' // Local key on the cars table...
            );
        }
        public function Daerah()
        {
            // return $this->hasOne(Mukim::class, 'U_Mukim_ID', 'mukim');
            return $this->hasOneThrough(
                Daerah::class,
                Mukim::class,
                'U_Mukim_ID', // Foreign key on the cars table...
                'U_Daerah_ID', // Foreign key on the owners table...
                'mukim', // Local key on the mechanics table...
                'U_Daerah_ID' // Local key on the cars table...
            );
        }
    
}
