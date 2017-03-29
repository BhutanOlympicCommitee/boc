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
    public function address()
    {
    	return $this->hasOne('App\Athlete_address','address_id','address_id');
    }
     public function athlete()
    {
    	return $this->hasOne('App\Athlete_bioinformation','athlete_id','athlete_id');
    }
}
