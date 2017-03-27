<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete_qualification extends Model
{
    public $primaryKey = 'qualification_id';
    public function displayCountry()
    {
    	return $this->belongsTo('App\Mst_country','country_id','country_id');
    }
    public function country()
    {
    	return $this->belongsTo('App\Mst_country','country_id','country_id');
    }
}
