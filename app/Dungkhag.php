<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dungkhag extends Model
{
    protected $primaryKey='dungkhag_id';
    public function displayDzongkhag()
    {
    	return $this->belongsTo('App\MstDzongkhag','dzongkhag_id');
    }
}
