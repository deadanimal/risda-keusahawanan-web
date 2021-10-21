<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usahawans', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Kod_PT');
            $table->string('namausahawan',150);
            $table->string('nokadpengenalan',14);
            $table->date('tarikhlahir');
            $table->integer('U_Jantina_ID');
            $table->string('U_Bangsa_ID',14);
            $table->string('statusperkahwinan',50);
            $table->integer('U_Pendidikan_ID');
            $table->string('alamat1',150);
            $table->string('alamat2',150);
            $table->string('alamat3',150);
            $table->string('bandar',50);
            $table->integer('poskod')->length(5);
            $table->string('U_Negeri_ID',12);
            $table->string('U_Daerah_ID',12);
            $table->string('U_Mukim_ID',12);
            $table->string('U_Parlimen_ID',12);
            $table->string('U_Dun_ID',12);

            $table->string('U_Kampung_ID',12)->nullable();
            $table->string('U_Seksyen_ID',12)->nullable();
            $table->string('id_kategori_usahawan',12)->nullable();
            $table->string('gambar_url',50)->nullable();

            $table->string('notelefon',15);
            $table->string('nohp',15);
            $table->string('email',100);

            $table->string('createdby_id',50)->nullable();
            $table->string('createdby_kod_PT',50)->nullable();
            $table->string('modifiedby_id',50)->nullable();
            $table->string('modifiedby_kod_PT',50)->nullable();
            
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
        Schema::dropIfExists('usahawans');
    }
}
