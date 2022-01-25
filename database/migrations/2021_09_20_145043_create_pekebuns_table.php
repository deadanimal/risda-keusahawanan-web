<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekebunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekebuns', function (Blueprint $table) {
            $table->id();

            $table->string('usahawanid',50);
            $table->string('status_daftar_usahawan',50);
            $table->string('Nama_PK',250);
            $table->string('No_KP',50);
            // $table->string('Tsmohon_No',20);
            
            // $table->string('No_Geran',50);
            // $table->string('No_Lot',50);
            // $table->string('U_Negeri_ID',12);
            // $table->string('U_Daerah_ID',12);
            // $table->string('U_Mukim_ID',12);
            // $table->string('U_Parlimen_ID',12);
            // $table->string('U_Dun_ID',12);
            // $table->string('U_Kampung_ID',12);
            // $table->string('U_Seksyen_ID',12);
            // $table->decimal('keluasan_hektar',18); 
            // $table->string('jenis_tanaman_kebun',50); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekebuns');
    }
}
