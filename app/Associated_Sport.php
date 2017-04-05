<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associated_Sport extends Model
{
    public $primaryKey = 'sport_id';
     public function Sport()
    {
    	return $this->belongsTo('App\Sport_Organization','sport_org_id','sport_org_id');
    }
}
