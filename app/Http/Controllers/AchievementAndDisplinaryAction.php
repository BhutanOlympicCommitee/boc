<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_athlete_disciplinary;
use App\Tbl_athlete_achievement;
use App\Athlete_bioinformation;
use Auth;
use Session;
use App\User;
use App\Associated_Sport;

class AchievementAndDisplinaryAction extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function displayAthleteInfo()
    {
        $associated_sport=array();
        $user=User::where('id',Session::get('user_id'))->first();
        $associatedSport=Associated_Sport::where('sport_org_id',$user->sport_organization)->pluck('sport_id');
        $associated=explode(',',$associatedSport);
        foreach($associated as $assoc)
        {
            $associated_sport[]=trim($assoc,'[]');
        }
        $athlete_info=Athlete_bioinformation::whereIn('athlete_associatedSport',$associated_sport)->get();
        return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
    }
    //     $athlete_info=Athlete_bioinformation::all();
    //     return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
    // }

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
     public function searchSportCoach(Request $request)
    {
        if(!empty($request->associatedSport))
        {
            $athlete_info=Athlete_bioinformation::join('associated__sports','athlete_bioinformations.athlete_associatedSport','associated__sports.sport_id')
                ->select('athlete_bioinformations.*')
                ->where('associated__sports.sport_id','=',$request->associatedSport)
                ->get();
            return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
        }
        else if(!empty($request->federation))
        {
            $athlete_info=Athlete_bioinformation::join('tbl_team_members','athlete_bioinformations.athlete_id','tbl_team_members.athlete_id')
            ->join('tbl_sport_coaches','tbl_sport_coaches.gamesdetail_id','tbl_team_members.gamesdetail_id')
            ->select('athlete_bioinformations.*')
            ->where('tbl_sport_coaches.federation',$request->federation)
            ->get();
            return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
        }
        else if(!empty($request->games))
        {
            $athlete_info=Athlete_bioinformation::join('tbl_team_members','athlete_bioinformations.athlete_id','tbl_team_members.athlete_id')
                ->select('athlete_bioinformations.*')
                ->where('tbl_team_members.gamesdetail_id','=',$request->games)
                ->get();
                return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
        }
        else if(!empty($request->year))
        {
            $athlete_info=Athlete_bioinformation::join('tbl_team_members','athlete_bioinformations.athlete_id','tbl_team_members.athlete_id')
                ->join('tbl_game_details','tbl_game_details.gamesdetail_id','tbl_team_members.gamesdetail_id')
                ->select('athlete_bioinformations.*')
                ->where('tbl_game_details.year','=',$request->year)
                ->get();
                return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
        }
        else
        {
            $athlete_info=Athlete_bioinformation::all();
             return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info',compact('athlete_info'));
        }
    }
}
