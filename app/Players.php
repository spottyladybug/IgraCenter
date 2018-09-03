<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_user_player';
    protected $table = 'users_players';
}
