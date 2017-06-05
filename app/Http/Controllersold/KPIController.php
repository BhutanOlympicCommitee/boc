<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_proposed_KPI;
use App\Tbl_KPI_approved;
use App\Tbl_UpdateSportActivity;
use Session;
use Auth;

class KPIController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index_kpi($id)
    {
        $kpi = Tbl_proposed_KPI::where('activity_id',$id)->get();
        Session::put('activity_id',$id);
       return view('common_view.KPI_master.index',compact('kpi'));
    }

     public function filterKPI($id)
    {
        $searchkpi=Tbl_proposed_KPI::where('activity_id',$id)->get();
        return view('sport_organization_user.search_activity.searchKPI',compact('searchkpi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('common_view.KPI_master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $kpi = new Tbl_proposed_KPI;
        $kpi->activity_id=Session::get('activity_id');
        $kpi->kpi_name=$request->kpi_name;
        $kpi->RGoB=$request->RGoB;
        $kpi->external=$request->external;
        $kpi->unit=$request->unit;
        $kpi->baseline=$request->baseline;
        $kpi->good=$request->good;
        $kpi->average=$request->average;
        $kpi->poor=$request->poor;
        $kpi->created_by=Auth::user()->id;
        $kpi->updated_by=Auth::user()->id;
        $kpi->save();
        Session::flash('success', 'Kpi created successfully');
        return redirect()->route('KPI_master.index',Session::get('activity_id'));
    }

    public function addApprovedKPI($id, Request $request)
    {
        $kpi=new Tbl_KPI_approved;
        $kpi->kpi_id=$id;
        $kpi->approved_kpi_name=$request->approved_kpi;
        $kpi->approved_RGoB=$request->approved_rgob;
        $kpi->approved_external=$request->approved_external;
        $kpi->approved_unit=$request->approved_units;
        $kpi->approved_baseline=$request->approved_baseline;
        $kpi->approved_good=$request->approved_good;
        $kpi->approved_average=$request->approved_average;
        $kpi->approved_poor=$request->approved_poor;
        $kpi->created_by=Auth::user()->id;
        $kpi->updated_by=Auth::user()->id;
        $kpi->save();
        $proposed_kpi=Tbl_proposed_KPI::find($id);
        $proposed_kpi->status=1;
        $proposed_kpi->save();
        return redirect()->route('review_plan.reviewKPI',Session::get('activity_id'));
    }

   public function update_kpi(Request $request)
    { 
      if($request->ajax()){
        $id = $request->id;
        $info = Tbl_proposed_KPI::find($id);
        return response()->json($info);
        }
    }
  

   public function update(Request $request)
    {
        $id=$request->edit_id;
        $kpi=Tbl_proposed_KPI::find($id);
        $kpi->kpi_name=$request->kpi_name;
        $kpi->RGoB=$request->RGoB;
        $kpi->external=$request->external;
        $kpi->unit=$request->unit;
        $kpi->baseline=$request->baseline;
        $kpi->good=$request->good;
        $kpi->average=$request->average;
        $kpi->poor=$request->poor;
        $kpi->save();
        Session::flash('success', 'KPI updated successfully');
        if($request->update=='update')
        {
            return redirect()->route('search_activity.searchKPI');
        }
        else
        {
            return redirect()->route('KPI_master.index',$kpi->kpi_id);
        }
    }

    public function listAndSearchKPI(Request $request)
    {
        $five_yrs=$request->five_yr_plan_id;
        $activity=$request->activity;
        if(!empty($activity))
        {
            $searchkpi=Tbl_proposed_KPI::where('activity_id',$activity)->get();
           return view('sport_organization_user.search_activity.searchKPI',compact('searchkpi'));
        }
        else if(!empty($five_yrs))
        {
            $five_yr=array();
            $five_year=Tbl_UpdateSportActivity::select('tbl__update_sport_activities.id')->where('tbl__update_sport_activities.five_yr_plan_id','=',$five_yrs)->pluck('id');
            $five_year=explode(',',$five_year);
            foreach($five_year as $five_year_plan_id)
            {
               $five_yr[]=trim($five_year_plan_id,'[]');
            }
            return $this->sendRequest($five_yr);
        }
        else if(!empty($request->skra_id))
        {
            $akra1=array();
            $akra_id=Tbl_UpdateSportActivity::select('tbl__update_sport_activities.id')->where('tbl__update_sport_activities.skra_id','=',$request->skra_id)->pluck('id');
            $akra_id=explode(',',$akra_id);
            foreach($akra_id as $akra)
            {
               $akra1[]=trim($akra,'[]');
            }
            return $this->sendRequest($akra1);
        }
        else if(!empty($request->skra_activity_id))
        {
            $boc_program=array();
            $program=Tbl_UpdateSportActivity::select('tbl__update_sport_activities.id')->where('tbl__update_sport_activities.skra_activity_id','=',$request->skra_activity_id)->pluck('id');
            $program=explode(',',$program);
            foreach($program as $boc_pro)
            {
               $boc_program[]=trim($boc_pro,'[]');
            }
            return $this->sendRequest($boc_program);
        }
        else
            return redirect()->route('search_activity.searchKPI');
    }
    public function sendRequest($form_input_value)
    {
        $searchkpi=Tbl_proposed_KPI::join('tbl_proposed_sport_org_activities','tbl_proposed__k_p_is.activity_id','tbl_proposed_sport_org_activities.activity_id')
            ->select('tbl_proposed__k_p_is.*')
            ->whereIn('tbl_proposed_sport_org_activities.weightage_id',$form_input_value)
            ->get();
         return view('sport_organization_user.search_activity.searchKPI',compact('searchkpi'));
    }
}

