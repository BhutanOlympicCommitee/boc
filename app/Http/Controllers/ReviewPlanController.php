<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tbl_proposed_sport_org_activity;
use App\Tbl_sport_org_activities_approved;
use App\Tbl_proposed_KPI;
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
        $approved_activity=Tbl_proposed_sport_org_activity::all();
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

    public function updateSportAchievement()
    {
        return view('sport_organization_user.update_achievement.sport_achievement_update');
    }
}
