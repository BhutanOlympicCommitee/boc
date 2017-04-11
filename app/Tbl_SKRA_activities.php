<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_SKRA_activities extends Model
{
    protected $primaryKey='skra_activity_id';
    public function skra()
    {
        return $this->belongsTo('App\Tbl_SKRA','skra_id','skra_id');
    }
    public function getSportOrganization()
    {
      return $this->belongsTo('App\Sport_Organization','sport_org_id','sport_org_id');
    }
}
