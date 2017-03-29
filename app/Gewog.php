<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gewog extends Model
{
    protected $primaryKey='gewog_id';
    public function displayDzongkhag()
    {
    	return $this->belongsTo('App\MstDzongkhag','dzongkhag_id');
    }
}
