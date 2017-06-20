<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_team_member extends Model
{
    protected $primaryKey='team_id';
    public function Game()
    {
        return $this->belongsTo('App\Tbl_game_detail','gamesdetail_id','gamesdetail_id');
    }
}
