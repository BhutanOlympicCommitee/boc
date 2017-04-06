<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_team_member extends Model
{
    protected $primaryKey='team_id';
    public function displayFederation()
    {
    	return $this->belongsTo('App\Sport_Organization','federation','sport_org_id');
    }
    public function displaySport()
    {
    	return $this->belongsTo('App\Associated_Sport','sport','sport_id');
    }
    public function displayAthlete()
    {
    	return $this->belongsTo('App\Athlete_bioinformation','athlete_id','athlete_name','athlete_id');
    }
    
}
