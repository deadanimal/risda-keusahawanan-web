<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyarikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarikats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('usahawanid');

            $table->string('namasyarikat',150);
            $table->string('jenismilikanperniagaan',12);
            $table->string('nodaftarssm',50);
            
            $table->string('nodaftarpbt',50)->nullable();
            $table->string('nodaftarpersijilanhalal',50)->nullable();
            $table->string('nodaftarmesti',50)->nullable();

            $table->string('tahunmulaoperasi',4);
            $table->integer('bilanganpekerja');

            $table->string('alamat1_ssm',150)->nullable();
            $table->string('alamat2_ssm',150)->nullable();
            $table->string('alamat3_ssm',150)->nullable();
            $table->date('tarikh_mula_mof')->nullable();
            $table->date('tarikh_tamat_mof')->nullable();
            $table->string('status_bumiputera')->nullable();
            $table->date('tarikh_daftar_ssm')->nullable();

            $table->string('notelefon',15);
            $table->string('no_hp',15);
            $table->string('email',100);
            $table->longText('logo_syarikat')->nullable();
            $table->string('prefix_id',50);
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
        Schema::dropIfExists('syarikats');
    }
}
