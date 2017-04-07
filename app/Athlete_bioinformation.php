<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete_bioinformation extends Model
{
 	public $primaryKey = 'athlete_id';
 	
     public function displayathlete()
    {
    	return $this->belongsTo('App\Athlete_occupation','occupation_id','occupation_name');
    }
    public function displayAsport()
    {
    	return $this->belongsTo('App\Associated_Sport','athlete_associatedSport','sport_id');
    }

    public function training()
    {
      return $this->belongsToMany('App\TrainingSchedule','athlete_training_schedules','athlete_id','training_id');
    }

    public function getAthleteAddress()
    {
        return $this->belongsTo('App\Athlete_address','athlete_id','athlete_id');
    }
}
