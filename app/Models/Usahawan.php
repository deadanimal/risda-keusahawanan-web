<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usahawan extends Model
{
    use HasFactory;

    protected $with = ['pekebun'];

        /**
         * Get the user associated with the Pegawai
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function pekebun()
        {
            return $this->hasOne(Pekebun::class, 'usahawanid', 'usahawanid');
        }
}
