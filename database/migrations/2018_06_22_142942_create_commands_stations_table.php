<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands_stations', function (Blueprint $table) {
            $table->integer('id_stat_com');
            $table->integer('id_com_stat');
            $table->integer('time_sec');
            $table->integer('id_shtraf')->nullable();
            $table->boolean('status_zagadka');
            $table->integer('id_kur_stat');
            $table->primary(['id_stat_com', 'id_com_stat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands_stations');
    }
}
