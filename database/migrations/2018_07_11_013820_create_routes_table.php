<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('team_id');
            $table->tinyInteger('station_id');
            $table->tinyInteger('station_order');
            $table->tinyInteger('status')->nullable();
            $table->dateTime('arrival_time')->nullable();
            $table->dateTime('departure_time')->nullable();
            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
