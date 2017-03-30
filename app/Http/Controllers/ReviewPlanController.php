<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ Tbl_sport_org_activities;
use App\Tbl_sport_org_activities_approved;
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
       $review_plan= Tbl_sport_org_activities::all();
       return view('boc_user.annual_activities_plan.review_plan.index',compact('review_plan'));
    }

    public function review($id)
    {
        $review_plan=Tbl_sport_org_activities::find($id);
        return view('boc_user.annual_activities_plan.review_plan.review',compact('review_plan'));
    }

    public function getAchievement_update(){
        $approved_activity=Tbl_sport_org_activities_approved::all();
        $proposed_activity=Tbl_sport_org_activities::all();
        return view('sport_organization_user.update_achievement.update_achievement',['approved_activity'=>$approved_activity]);
    }
    
    public function approved_activities(Request $request,$id)
    {
        $approved_activities=new Tbl_sport_org_activities_approved;
        $approved_activities->activity_id=$id;
        $approved_activities->approved_activity_name=$request->approved_activity;
        $approved_activities->approved_activity_baseline=$request->approved_baseline;
        $approved_activities->approved_activity_target=$request->approved_target;
        $approved_activities->approved_activity_venue=$request->approved_venue;
        $approved_activities->approved_activity_timeline=$request->approved_timeline; 
        $approved_activities->approved_capital_budget=$request->approved_capital_budget;
        $approved_activities->approved_recurring_budget=$request->approved_recurring_budget;
        $approved_activities->remarks=$request->approved_remarks;
        $approved_activities->updated_by=Auth::user()->id;
        $approved_activities->save();
        return redirect()->route('review_plan.index');

    }
    
}
