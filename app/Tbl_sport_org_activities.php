<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_sport_org_activities extends Model
{
     protected $primaryKey='activity_id';

     public function skra()
     {
      return $this->belongsTo('App\Tbl_SKRA','skra_id','skra_id');
     }

     public function skraActivity()
     {
      return $this->belongsTo('App\Tbl_SKRA_activities','skra_activity_id','skra_activity_id');
     }
}
