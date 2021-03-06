<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_athlete_medical;
use App\Athlete_qualification;
use Auth;
use Session;

class AthleteMedicalController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
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
        if(!empty(Session::get('athlete_id2')))
        {
            $athlete->athlete_id=Session::get('athlete_id2');
            Session::forget('athlete_id2');
        }
        else if(!empty(Session::get('athlete_id4')))
        {
            $athlete->athlete_id=Session::get('athlete_id4');
        }
        else
        {
            $athlete->athlete_id=Session::get('key');
        }
        $athlete->date=$request->date;
        $athlete->checked=$request->checked;
        $athlete->weight=$request->weight;
        $athlete->height=$request->height;
        $athlete->condition=$request->condition;
        $athlete->remarks=$request->remarks;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'Medical record created successfully');
        return redirect()->route('athlete_qualification.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athlete = Tbl_athlete_medical::findOrFail($id);
        Session::put('key3',$athlete->medical_id);

        // return to the edit views
        return view('sport_organization_user.athlete_information.athlete_medical.edit',compact('athlete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $athlete = Tbl_athlete_medical::where('athlete_id',$id)->first();
        $athlete->date=$request->date;
        $athlete->checked=$request->checked;
        $athlete->weight=$request->weight;
        $athlete->height=$request->height;
        $athlete->condition=$request->condition;
        $athlete->remarks=$request->remarks;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();

        if(Athlete_qualification::where('athlete_id',$id)->exists())
        {
           
            return redirect()->route('athlete_qualification.edit',$athlete->qualification->qualification_id)->with('alert-success','Data Has been Updated!');   

        }
        else{
             Session::put('athlete_id3',$id);
             return redirect()->route('athlete_qualification.index');     
        }
           
    }
}

