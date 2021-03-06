<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRazTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_raz', function (Blueprint $table) {
            $table->increments('team_id');
            $table->integer('COL 1');
            $table->integer('COL 2');
            $table->integer('COL 3');
            $table->integer('COL 4');
            $table->integer('COL 5');
            $table->integer('COL 6');
            $table->integer('COL 7');
            $table->integer('COL 8');
            $table->integer('COL 9');
            $table->integer('COL 10');
            $table->integer('COL 11');
        });

        Schema::table('table_raz', function (Blueprint $table) {
            $table->foreign('team_id')->references('id_com')->on('commands')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_raz');
    }
}
