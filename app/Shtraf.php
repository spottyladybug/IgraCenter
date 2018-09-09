<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shtraf extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_shtraf';
    protected $table = 'shtrafs';
}
