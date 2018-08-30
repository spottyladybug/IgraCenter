<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimerStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timer_station', function (Blueprint $table) {
            $table->increments('id_timer');
            $table->integer('id_st_timer');
            $table->integer('id_moder_timer');
            $table->dateTimeTz('end')->default(date("Y-m-d H:i:s", time()));
            $table->dateTimeTz('start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timer_station');
    }
}
