<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_UpdateSportActivity;
use App\Tbl_proposed_sport_org_activity;
use Auth;
use Session;
use App\User;
use App\Tbl_SKRA_activities;
use App\Tbl_KPI_approved;

class UpdateSportActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	//$sport_org_plan=Tbl_UpdateSportActivity::all();
    	// return view('sport_organization_user.sport_activity_plan.index',compact('sport_org_plan'));
        return view('sport_organization_user.sport_activity_plan.index');
    }
    public function addActivity()
    {
    	$skra1=array();
        $user=User::where('id',Session::get('user_id'))->first();
        $boc_program=Tbl_SKRA_activities::where('sport_org_id',$user->sport_organization)->pluck('skra_activity_id');
        $skra_activity1=explode(',',$boc_program);
        foreach($skra_activity1 as $skra)
        {
            $skra1[]=trim($skra,'[]');
        }
        $addActivity=Tbl_proposed_sport_org_activity::join('tbl__update_sport_activities','tbl_proposed_sport_org_activities.weightage_id','tbl__update_sport_activities.id')
            ->select('tbl_proposed_sport_org_activities.*')
            ->whereIn('tbl__update_sport_activities.skra_activity_id',$skra1)
            ->get();
    	return view('sport_organization_user.sport_activity_plan.addActivity',compact('addActivity'));
    }
    public function store(Request $request)
    {
        $sport_activity = new  Tbl_UpdateSportActivity;
        $sport_activity->five_yr_plan_id=$request->five_yr_plan_id;
        $sport_activity->skra_id=$request->skra_id;
        $sport_activity->skra_activity_id=$request->skra_activity_id;
        if($request->wieghtage>100)
        {
             Session::flash('success', 'Invalid Weightage!');
            return view('sport_organization_user.sport_activity_plan.index');
        }
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

    public function editActivities(Request $request)
    {
         if($request->ajax()){
            $id = $request->id;
            $info = Tbl_proposed_sport_org_activity::find($id);
            return response()->json($info);
        }
    }
    public function updateProposedActivities(Request $request)
    {
        $sport_org_activity=Tbl_proposed_sport_org_activity::findOrFail($request->hidden_edit_id);
        $sport_org_activity->activity_name=$request->activity;
        $sport_org_activity->activity_venue=$request->venue;
        $sport_org_activity->quarter_timeline=$request->quarter;
        $sport_org_activity->actual_timeline=$request->actual;
        $sport_org_activity->rgob_budget=$request->rgob_budget;
        $sport_org_activity->external_budget=$request->external_budget;
        $sport_org_activity->external_source=$request->external_source;
        $sport_org_activity->collaborating_agency=$request->collaborating;
        $sport_org_activity->created_by = session('user_id');
        $sport_org_activity->save();
        return redirect()->route('sport_activity_plan.addActivity');
    }

    public function getScore(Request $request)
    {
         if($request->ajax()){
            $id = $request->id;
            $target=$request->target;
            $score=Tbl_KPI_approved::where('kpi_approval_id',$id)->first();
            if($target<=$score->approved_goodRgEnd && $target>=$score->approved_goodRgStart)
            {
                return response()->json('good');
            }
            else if($target<=$score->approved_avgRgEnd && $target>=$score->approved_avgRgStart)
            {
                return response()->json('average');
            }
            else
                return response()->json('poor');
            
        }
    }

    public function getWeight(Request $request)
    {
        if($request->ajax())
        {
            $id=$request->id;
            $score=$request->score;
            $weightage=Tbl_KPI_approved::where('kpi_approval_id',$id)->first();
            if($score=="good")
            {
                $weight=($weightage->approved_kpi_weight)*1;
                return response()->json($weight);
            }
            else if($score=="average")
            {
                $weight=($weightage->approved_kpi_weight)*0.5;
                return response()->json($weight);
            }
            else
            {
                $weight=$weightage->approved_kpi_weight*0.25;
                return response()->json($weight);
            }
        }
    }
}

