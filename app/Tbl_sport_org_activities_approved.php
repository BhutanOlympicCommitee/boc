<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_sport_org_activities_approved extends Model
{
    protected $primarykey='activity_approval_id';
    public function proposedActivity()
    {
      return $this->belongsTo('App\Tbl_sport_org_activities','activity_id','activity_id');
    }
}
