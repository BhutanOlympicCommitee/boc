<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_update_athleteAchievement extends Model
{
     public $primaryKey = 'athlete_id';
    public function displayDzongkhag()
    {
    	return $this->belongsTo('App\MstDzongkhag','dzongkhag_id');
    }
    public function displayGewog()
    {
    	return $this->belongsTo('App\Gewog','gewog_id');
    }
}
