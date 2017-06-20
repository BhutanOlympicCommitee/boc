<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_official extends Model
{
   protected $primaryKey='official_id';

   public function games()
   {
   	return $this->belongsTo('App\Tbl_game_detail','games_id','gamesdetail_id');
   }
   public function getSportOrganization()
   {
   	return $this->belongsTo('App\Sport_Organization','sport_org_id','sport_org_id');
   }
}
