<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    protected $fillable = [
        'name_user', 'group_user', 'password',
    ];
}
