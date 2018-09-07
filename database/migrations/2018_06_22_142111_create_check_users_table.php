<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_users', function (Blueprint $table) {
            $table->increments('id_check_user');
            $table->string('random_user')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('check_users', function (Blueprint $table) {
            $table->foreign('id_check_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_users');
    }
}
