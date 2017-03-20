<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstDzongkhag extends Model
{
    protected $primaryKey='dzongkhag_id';
    public function displayCountry()
    {
    	return $this->belongsTo('App\Mst_country','country_id','country_id');
    }
}
