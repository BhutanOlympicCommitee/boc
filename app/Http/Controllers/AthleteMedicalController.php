<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_athlete_medical;
use Auth;
use Session;

class AthleteMedicalController extends Controller
{
       public function create()
    {
        return view('sport_organization_user.athlete_information.athlete_medical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete= new Tbl_athlete_medical;
        $athlete->athlete_id=Session::get('key');
        $athlete->date=$request->date;
        $athlete->checked=$request->checked;
        $athlete->weight=$request->weight;
        $athlete->height=$request->height;
        $athlete->condition=$request->condition;
        $athlete->remarks=$request->remarks;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'created successfully');
        return redirect()->route('athlete_qualification.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}

