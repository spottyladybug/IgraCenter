<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Check_moders extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'id_moder','hash_moder'
    ];
}