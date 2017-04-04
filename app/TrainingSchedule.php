<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
     protected $primaryKey='training_id';
    public function day()
    {
      return $this->belongsTo('App\EnumDaytable','day_id','day_id');
    }
}
