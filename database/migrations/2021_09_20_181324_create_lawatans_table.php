<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawatans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pengguna');
            $table->foreignId('id_tindakan_lawatan');

            $table->string('jenis_lawatan',15);
            $table->date('tarikh_lawatan');
            $table->date('masa_lawatan');
            $table->string('status_lawatan',10);
            $table->string('gambar_lawatan',150);
            $table->string('komen',200);
            $table->string('modified_by',50);

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
        Schema::dropIfExists('lawatans');
    }
}
