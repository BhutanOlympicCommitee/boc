<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_bioinformation;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;

class AthleteInformationController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport_organization_user.athlete_information.athlete_info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete= new Athlete_bioinformation;
        $athlete->athlete_title=$request->title;
        $athlete->athlete_fname=$request->fname;
        $athlete->athlete_mname=$request->mname;
        $athlete->athlete_lname=$request->lname;
        $athlete->athlete_occupation=$request->occupation;
        $athlete->athlete_dob=$request->dob;
        $athlete->athlete_pob=$request->pob;
        $athlete->athlete_gender=$request->gender;
        $athlete->athlete_height=$request->height;
        $athlete->athlete_weight=$request->weight;
        $athlete->athlete_fathername=$request->fathername;
        $athlete->athlete_passportNo=$request->passportNo;
        $athlete->athlete_cid=$request->cid;
        $athlete->athlete_associatedSport=$request->associatedSport;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $athlete->athlete_photo = $file->getClientOriginalName();
        }
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'AthleteInfos has been created successfully');
        Session::put('key',$athlete->athlete_id);
        return redirect()->route('athlete_address.create');
    }
    public function updateAthleteFunction(Request $request)
    {
        $update_function=Athlete_bioinformation::findOrFail( $request->hidden_id);
        $update_function->athlete_function=$request->ath_function;
        $update_function->save();
        Session::flash('success', 'athlete_function updated successfully');
        return redirect()->route('team_master.index');
    }
}