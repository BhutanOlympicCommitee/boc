<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_athlete_disciplinary;
use App\Tbl_athlete_achievement;
use Auth;
use Session;

class AchievementAndDisplinaryAction extends Controller
{
    public function displayAthleteInfo()
    {
        return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info');
    }

    public function store(Request $request)
    {
        $achievement = new Tbl_athlete_achievement;
        $achievement->athlete_id= $request->hidden_athlete_id;
        $achievement->medal_id=$request->medals;
        $achievement->date=$request->date;
        $achievement->achievement=$request->achievement;
        $achievement->remark=$request->remark;
        $achievement->created_by=Auth::user()->id;
        $achievement->updated_by=Auth::user()->id;
        $achievement->save();
        Session::flash('success', 'Achievement created successfully');
        return redirect()->route('display_matching_athlete');

    }

     public function Actionstore(Request $request)
    {
        $achievement = new Tbl_athlete_disciplinary;
        $achievement->athlete_id= $request->hide_athlete_id;
        $achievement->date_of_action=$request->date_of_action;
        $achievement->action_end_date=$request->action_end_date;
        $achievement->reason=$request->reason;
        $achievement->remarks=$request->remarks;
        $achievement->created_by=Auth::user()->id;
        $achievement->updated_by=Auth::user()->id;
        $achievement->save();
        Session::flash('success', 'Achievement created successfully');
        return redirect()->route('display_matching_athlete');

    }



}
