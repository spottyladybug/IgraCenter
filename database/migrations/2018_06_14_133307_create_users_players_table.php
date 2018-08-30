<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_players', function (Blueprint $table) {
            $table->increments('id_user_player');
            $table->integer('team_player')->unsigned()->nullable();
            $table->integer('status_player');
        });

        Schema::table('users_players', function (Blueprint $table) {
            $table->foreign('team_player')->references('id_com')->on('commands')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
