<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_UpdateSportActivity;
use Auth;
use Session;

class UpdateSportActivityController extends Controller
{
    public function index()
    {
    	$sport_org_plan=Tbl_UpdateSportActivity::all();
    	return view('sport_organization_user.sport_activity_plan.index',compact('sport_org_plan'));
    }
    public function addActivity()
    {
    	$addActivity=Tbl_UpdateSportActivity::all();
    	return view('sport_organization_user.sport_activity_plan.addActivity',compact('addActivity'));
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
         Session::put('key',$sport_activity->id);
         // echo $sport_activity->id;
        return redirect()->route('sport_activity_plan.edit',Session::get('key'));
    }

     public function edit($id)
    {
        $sport_activity_edit=Tbl_UpdateSportActivity::findOrFail($id);
        return view('sport_organization_user.sport_activity_plan.edit',compact('sport_activity_edit'));
    }

     public function update(Request $request, $id)
    {
        $sport_activity = Tbl_UpdateSportActivity::findOrFail($id);
        $sport_activity->five_yr_plan_id=$request->five_yr_plan_id;
        $sport_activity->skra_id=$request->skra_id;
        $sport_activity->skra_activity_id=$request->skra_activity_id;
        $sport_activity->wieghtage=$request->wieghtage;
        $sport_activity->save();
        Session::flash('success', 'SKRA has been created successfully');
        
        return redirect()->route('sport_activity_plan.edit');
    }
}

