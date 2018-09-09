<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandsStations extends Model
{
    protected $primaryKey = 'id_stat_com';
    public $timestamps = false;
    protected $table = 'commands_stations';
}
