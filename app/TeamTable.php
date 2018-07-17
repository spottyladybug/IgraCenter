<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamTable extends Model
{
    public $timestamps = false;

    protected $fillable = ['team_id', 'player_id'];

    public static function byTeam($team_id) {
        return static::where('team_id', $team_id)->get();
    }

    public function team() {
        return $this->hasOne('App\Team', 'id', 'team_id');
    }

    public function player() {
        return $this->hasOne('App\User', 'id', 'player_id');
    }
}
