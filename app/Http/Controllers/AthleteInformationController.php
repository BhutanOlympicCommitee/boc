<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_bioinformation;
use Auth;
use Session;

class AthleteInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('athlete_info.create');
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
        $athlete->athlete_photo=$request->photo;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'AthleteInfos has been created successfully');
        Session::put('key',$athlete->athlete_id);
        echo $athlete->athlete_id;
        return redirect()->route('athlete_address.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
       
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
      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
