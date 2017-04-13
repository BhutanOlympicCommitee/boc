<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_proposed_KPI;
use App\Tbl_KPI_approved;
use Session;
use Auth;

class KPIController extends Controller
{
    public function index_kpi($id)
    {
        $kpi = Tbl_proposed_KPI::all();
        Session::put('activity_id',$id);
       return view('common_view.KPI_master.index',compact('kpi'));
    }

     public function searchKPI()
    {
        $searchkpi=Tbl_proposed_KPI::all();
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
        return redirect()->route('KPI_master.index',$kpi->kpi_id);
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
        return redirect()->route('review_plan.reviewKPI',$id);
    }

   public function update_kpi()
    { 
      // if($request->ajax()){
      //       $id = $request->id;
      //       // $info = Tbl_proposed_KPI::where('kpi_id',$id)->first();
      //       return response()->json($id);

        // }
        echo 'kfdgkfg';
    }
  

   public function update(Request $request)
    {
        // $id=$request->edit_id;
        // $kpi=Tbl_proposed_KPI::find($id);
        // $kpi->kpi_name=$request->kpi_name;
        // $kpi->RGoB=$request->RGoB;
        // $kpi->external=$request->external;
        // $kpi->unit=$request->unit;
        // $kpi->baseline=$request->baseline;
        // $kpi->good=$request->good;
        // $kpi->average=$request->average;
        // $kpi->poor=$request->poor;
        // $dzongkhag->save();
        // Session::flash('success', 'KPI updated successfully');
        // return redirect()->route('KPI_master.index');
        echo 'jfdgkfgld';
    }
}

