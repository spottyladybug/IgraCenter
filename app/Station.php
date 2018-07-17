<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'moderator', 'riddle'];
}
