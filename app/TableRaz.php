<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableRaz extends Model
{
    protected $primaryKey = 'team_id';
    protected $table = 'table_raz';
    public $timestamps = false;
}
