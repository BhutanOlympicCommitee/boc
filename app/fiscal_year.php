<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fiscal_year extends Model
{
    protected $primaryKey='fiscal_id';
    public function displayFiveYear()
    {
    	return $this->belongsTo('App\EnumFiveYearPlan','five_yr_plan_id','five_yr_plan_id');
    }
}
