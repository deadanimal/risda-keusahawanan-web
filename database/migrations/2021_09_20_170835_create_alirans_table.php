<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAliransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alirans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_pengguna');
            $table->integer('id_kategori_aliran');
            $table->date('tarikh_aliran');
            $table->string('keterangan_aliran', 100);
            $table->double('jumlah_aliran',30,2);
            $table->string('kategori_aliran',50);
            $table->string('dokumen_lampiran',150)->nullable();
            $table->string('modified_by');


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
        Schema::dropIfExists('alirans');
    }
}
