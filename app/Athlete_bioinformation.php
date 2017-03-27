<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete_bioinformation extends Model
{
     public function displayathlete()
    {
    	return $this->belongsTo('App\Athlete_occupation','occupation_id','occupation_name');
    }
    public function displayAsport()
    {
    	return $this->belongsTo('App\Associated_Sport','sport_id','sport_name');
    }
}
