<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_athlete_disciplinary extends Model
{
	protected $primaryKey='disciplinary_id';
    public function displayAthlete()
    {
    	return $this->belongsTo('App\Athlete_bioinformation','athlete_id','athlete_name','athlete_id');
    }
    
}
