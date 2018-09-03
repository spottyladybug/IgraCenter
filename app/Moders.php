<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moders extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_user_moder';
    protected $table = 'users_moders';
}
