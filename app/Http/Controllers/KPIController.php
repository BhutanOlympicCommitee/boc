<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_proposed_KPI;
use Session;
use Auth;

class KPIController extends Controller
{
    public function index($id)
    {
        $kpi = Tbl_proposed_KPI::all();
        Session::put('activity_id',$id);
       return view('common_view.KPI_master.index',compact('kpi'));
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

   public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Tbl_proposed_KPI::where('kpi_id',$id)->first();
            return response()->json($info);
        }
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $dzongkhag->save();
        Session::flash('success', 'KPI updated successfully');
        return redirect()->route('KPI_master.index');
    }
}

