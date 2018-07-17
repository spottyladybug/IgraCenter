<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public $timestamps = false;

    protected $fillable = ['team_id', 'station_id', 'station_order', 'status', 'arrival_time', 'departure_time'];
}
