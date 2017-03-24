<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport_Organization extends Model
{
    public $primaryKey = 'sport_org_id';
    public function enum()
    {
    	return $this->belongsTo('App\Enum_sport_org','sport_org_type_id','sport_org_type_id');
    }
    public function contact()
    {
    	return $this->hasOne('App\Tbl_sport_org_contact_person','sport_org_id','sport_org_id');
    }
    
}
