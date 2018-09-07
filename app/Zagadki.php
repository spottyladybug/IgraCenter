<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zagadki extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_zag';
    protected $table = 'zagadki';
}
