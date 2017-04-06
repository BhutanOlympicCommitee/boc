<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_sport_coach extends Model
{
    protected $primaryKey='sc_id';
    public function displayFederation()
    {
    	return $this->belongsTo('App\Sport_Organization','federation','sport_org_id');
    }
    public function displaySport()
    {
    	return $this->belongsTo('App\Associated_Sport','sport','sport_id');
    }
    public function displayCoach()
    {
    	return $this->belongsTo('App\Tbl_Coach','coach','coach_id');
    }
}
