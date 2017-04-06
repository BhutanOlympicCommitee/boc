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
    public function coach()
    {
      return $this->belongsTo('App\Tbl_Coach','coach_id','coach_id');
    }
    public function athlete()
    {
      return $this->belongsToMany('App\Athlete_bioinformation','athlete_training_schedules','training_id','athlete_id');
    }

    public function session()
    {
      return $this->belongsTo('App\EnumSessionType','session_type','session_type_id');
    }
}
