<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_sport_org_activities;
use  App\Tbl_UpdateSportActivity;
use Auth;
use Session;

class Sport_org_activitiesController extends Controller
{
    public function index()
    {
    	$sport_activity_plan=Tbl_UpdateSportActivity::all();
    	return view('annual_activity_plan.sport_activity_plan.index',compact('sport_activity_plan'));
    }
    public function store(Request $request)
    {
        $sport_activity = new  Tbl_UpdateSportActivity;
        $sport_activity->five_yr_plan_id=$request->five_yr_plan_id;
        $sport_activity->skra_id=$request->skra_id;
        $sport_activity->skra_activity_id=$request->skra_activity_id;
        $sport_activity->wieghtage=$request->wieghtage;
        $sport_activity->created_by=Auth::user()->id;
        $sport_activity->updated_by=Auth::user()->id;
        $sport_activity->save();
        Session::flash('success', 'SKRA has been created successfully');
        
        return redirect()->route('sport_activity_plan.index');
    }
}
