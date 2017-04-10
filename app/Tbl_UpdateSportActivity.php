<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_UpdateSportActivity extends Model
{
  public function getAKRA()
  {
    return $this->belongsTo('App\Tbl_SKRA','skra_id','skra_id');
  }
  public function getAKRAActivity()
  {
    return $this->belongsTo('App\Tbl_SKRA_activities','skra_activity_id','skra_activity_id');
  }
}
