<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersModersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_moders', function (Blueprint $table) {
            $table->increments('id_user_moder');
            $table->integer('id_station_moder')->unsigned()->nullable();
            $table->text('comment')->nullable();
        });

        Schema::table('users_moders', function (Blueprint $table) {
            $table->foreign('id_station_moder')->references('id_station')->on('stations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moders');
    }
}
