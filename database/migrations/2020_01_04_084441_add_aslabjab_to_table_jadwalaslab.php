<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAslabjabToTableJadwalaslab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwalaslab', function (Blueprint $table) {
            $table->integer('aslabjab')->unsigned();
            $table->foreign('aslabjab')->references('id')->on('aslabjab');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwalaslab', function (Blueprint $table) {
            //
        });
    }
}
