<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riddle extends Model
{
    public $timestamps = false; 

    protected $fillable = ['text', 'img'];
}
