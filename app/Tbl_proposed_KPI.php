<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_proposed_KPI extends Model
{
    protected $primaryKey='kpi_id';
    public function proposedActivity()
    {
      return $this->belongsTo('App\Tbl_proposed_sport_org_activity','activity_id','activity_id');
    }
}
