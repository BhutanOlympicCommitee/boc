<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete_address extends Model
{
    public $primaryKey = 'address_id';
    public function athlete()
    {
    	return $this->hasOne('App\Athlete_bioinformation','athlete_id','athlete_id');
    }
    public function getDzongkhag()
    {
    return $this->belongsTo('App\MstDzongkhag','Paddress_dzongkhag','dzongkhag_id');
    }
    public function getGewog()
    {
    return $this->belongsTo('App\Gewog','Paddress_gewog','gewog_id');
    }
}
