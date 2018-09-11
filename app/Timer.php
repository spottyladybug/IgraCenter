<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_timer';
    protected $table = 'timer_station';

    protected $fillable = [
        'id_st_timer', 'id_moder_timer', 'end', 'start'
    ];
}
