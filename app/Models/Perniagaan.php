<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perniagaan extends Model
{
    use HasFactory;

    protected $with = ['jenis'];

    /**
         * Get the user associated with the Pegawai
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
    public function jenis()
    {
        return $this->hasOne(JenisPerniagaan::class, 'kod_jenis_perniagaan', 'jenisperniagaan');
    }
}
