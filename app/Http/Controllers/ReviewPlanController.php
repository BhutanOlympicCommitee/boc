<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tbl_proposed_sport_org_activity;
use App\Tbl_sport_org_activities_approved;
use App\Tbl_proposed_KPI;
use App\Tbl_Updateathlete_achievement;
use App\Tbl_update_athleteAchievement;
use Auth;
use Session;
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

class ReviewPlanController extends Controller
{
    public function index()
    {
       $review_plan= Tbl_proposed_sport_org_activity::all();
       return view('boc_user.annual_activities_plan.review_plan.index',compact('review_plan'));
    }

    public function review($id)
    {
        $review_plan=Tbl_proposed_sport_org_activity::find($id);
        return view('boc_user.annual_activities_plan.review_plan.review',compact('review_plan'));
    }
     public function showKPI($id)
    {
        $review_kpi=Tbl_proposed_KPI::where('activity_id',$id)->get();
        return view('boc_user.annual_activities_plan.review_plan.showKPI',compact('review_kpi'));
    }
    public function reviewKPI($id)
    {
        $review_kpi=Tbl_proposed_KPI::find($id);
        return view('boc_user.annual_activities_plan.review_plan.reviewKPI',compact('review_kpi'));
    }
    public function getAchievement_update(){
        $approved_activity=Tbl_sport_org_activities_approved::all();
        // $proposed_activity=Tbl_sport_org_activities::all();
        return view('sport_organization_user.update_achievement.update_achievement',['approved_activity'=>$approved_activity]);
    }
    
    

    public function approved_activities(Request $request,$id)
    {
        $approved_activities=new Tbl_sport_org_activities_approved;
        $approved_activities->activity_id=$id;
        $approved_activities->approved_activity_name=$request->approved_activity;
        $approved_activities->approved_activity_venue=$request->approved_venue;
        $approved_activities->approved_quarter_timeline=$request->approved_quarter;
        $approved_activities->approved_actual_timeline=$request->approved_actual;
        $approved_activities->approved_rgob_budget=$request->approved_rgob; 
        $approved_activities->approved_external_budget=$request->approved_external;
        $approved_activities->approved_external_source=$request->approved_source;
        $approved_activities->approved_collaborating_agency=$request->approved_collaborating_agency;
        $approved_activities->updated_by=Auth::user()->id;
        $approved_activities->save();
        $proposed_activities=Tbl_proposed_sport_org_activity::find($id);
        $proposed_activities->status=1;
        $proposed_activities->save();
        return redirect()->route('review_plan.index');

    } 

    public function athlete_achievement()
    {
       $athlete_achievement= Tbl_update_athleteAchievement::all();
       return view('sport_organization_user.update_achievement.athlete_achievement',compact('athlete_achievement'));
    }

    public function storeAthlete(Request $request)
    {
        $athlete_achievement=new Tbl_update_athleteAchievement;
        $athlete_achievement->athlete_cid= $request->athlete_cid;
        $athlete_achievement->athlete_name= $request->athlete_name;
        $athlete_achievement->athlete_dob=$request->athlete_dob;
        $athlete_achievement->dzongkhag_id=$request->dzongkhag_id;
        $athlete_achievement->gewog_id=$request->gewog_id;
        $athlete_achievement->village=$request->village;
        $athlete_achievement->occupation_id=$request->occupation_id;
        $athlete_achievement->fathername=$request->fathername;
        $athlete_achievement->mobile=$request->mobile;
        $athlete_achievement->email=$request->email;
        $athlete_achievement->contact_address=$request->contact_address;
        $athlete_achievement->created_by=Auth::user()->id;
        $athlete_achievement->updated_by=Auth::user()->id;
        $athlete_achievement->save();
        return redirect()->route('update_achievement.athlete_achievement');
    }

    public function storeAthleteAchievement(Request $request)
    {
        $athlete_achievement=new Tbl_Updateathlete_achievement;
        // echo $request->hidden_athlete_id;
        $athlete_achievement->athlete_id= $request->hidden_athlete_id;
        $athlete_achievement->activity_id=$request->activity_id;
        $athlete_achievement->sport_id=$request->sport_id;
        $athlete_achievement->medal_id=$request->medal_id;
        $athlete_achievement->remarks=$request->remarks;
        $athlete_achievement->created_by=Auth::user()->id;
        $athlete_achievement->updated_by=Auth::user()->id;
        $athlete_achievement->save();
        return redirect()->route('update_achievement.athlete_achievement');
    }

    public function updateSportAchievement($id)
    {
        $approved_activity=Tbl_sport_org_activities_approved::where('activity_approval_id',$id)->first();
        return view('sport_organization_user.update_achievement.sport_achievement_update',compact('approved_activity'));
    }
}
