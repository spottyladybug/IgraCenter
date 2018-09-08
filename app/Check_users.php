<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Check_users extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_check_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_check_user', 'hash_user', 'random_user',
    ];
}
