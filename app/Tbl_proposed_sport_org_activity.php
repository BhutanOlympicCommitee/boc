<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_proposed_sport_org_activity extends Model
{
  protected $primaryKey='activity_id';
  public function updated_activity()
  {
    return $this->belongsTo('App\Tbl_UpdateSportActivity','weightage_id','id');
  }
  public function quarterTimeline()
  {
    return $this->belongsTo('App\Enum_quarter','quarter_timeline','quarter_id');
  }
}
