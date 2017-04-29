<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_athlete_medical extends Model
{
	 public $primaryKey = 'medical_id';
     public function athlete()
    {
    	return $this->hasOne('App\Athlete_bioinformation','athlete_id','athlete_id');
    }
}
