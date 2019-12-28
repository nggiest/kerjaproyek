<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwallabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwallab', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hari_id')->unsigned();
            $table->foreign('hari_id')->references('id')->on('hari');
            $table->integer('jampel');
            $table->integer('makul_id')->unsigned();
            $table->foreign('makul_id')->references('id')->on('makul');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->integer('dosen_id')->unsigned();
            $table->foreign('dosen_id')->references('id')->on('dosen');
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
        Schema::dropIfExists('jadwallab');
    }
}
