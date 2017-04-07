<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoachSeperation;
use App\Tbl_Coach;
use Auth;
use Session;

class CoachSeperationController extends Controller
{
   
    public function store(Request $request)
    {
        $seperation = new CoachSeperation;
        $seperation->coach_id= $request->hidden_coach_id;
        $seperation->seperation_date=$request->seperation_date;
        $seperation->seperation_comment=$request->seperation_comment;
        $seperation->created_by=Auth::user()->id;
        $seperation->save();
        Session::flash('success','successfully seperated');
        //return redirect()->route('coach_master.index');
        return $this->changeCoachStatus($seperation->coach_id);

    }
    
    public function changeCoachStatus($coach_id)
    {
        $coach_info=Tbl_Coach::findOrFail($coach_id);
        $coach_info->status=1;
        $coach_info->save();
        return redirect()->route('coach_master.index');
    }
   }