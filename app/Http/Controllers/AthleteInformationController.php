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
        $athletes= new Athlete_bioinformation;
         $athletes = Athlete_bioinformation::findOrFail($id);
        Session::put('key3',$athletes->qualification_id);

        // return to the edit views
        return view('athlete_info.edit',compact('athletes'));
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
        $athletes = Athlete_bioinformation::findOrFail($id);
        $athletes->athlete_title=$request->title;
        $athletes->athlete_fname=$request->fname;
        $athletes->athlete_lname=$request->lname;
        $athletes->athlete_occupation=$request->occupation;
        $athletes->athlete_dob=$request->dob;
        $athletes->athlete_pob=$request->pob;
        $athletes->athlete_gender=$request->gender;
        $athletes->athlete_height=$request->height;
        $athletes->athlete_weight=$request->weight;
        $athletes->athlete_fathername=$request->fathername;
        $athletes->athlete_passportNo=$request->passportNo;
        $athletes->athlete_cid=$request->cid;
        $athletes->athlete_associatedSport=$request->associatedSport;
        $athletes->athlete_photo=$request->photo;
        $athletes->save();
        if($request->update1=='form1')
        {
           return redirect()->route('athlete_qualification.index')->with('alert-success','Data Has been Updated!');    
        }
       else
        {
            return redirect()->route('athlete_qualification.edit')->with('alert-success','Data Has been not Updated!');  
        }    
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
