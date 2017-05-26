<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Athlete_qualification;

class AthleteQualificationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $athlete_qualification=Athlete_qualification::all();
       return view('sport_organization_user.athlete_information.athlete_qualification.index',compact('athlete_qualification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport_organization_user.athlete_information.athlete_qualification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete= new Athlete_qualification;
        $athlete->athlete_id=Session::get('key');
        $athlete->qualification_level=$request->type1;
        $athlete->qualification_description=$request->description;
        $athlete->qualification_year=$request->year;
        $athlete->country_id=$request->type;
        $athlete->qualification_institute=$request->institute;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'Athlete qualification has been created successfully');
       return redirect()->route('athlete_qualification.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athletes= new Athlete_qualification;
         $athletes = Athlete_qualification::findOrFail($id);
        Session::put('key1',$athletes->qualification_id);

        // return to the edit views
        return view('sport_organization_user.athlete_information.athlete_qualification.edit',compact('athletes'));
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
        $athletes = Athlete_qualification::findOrFail($id);
        $athletes->qualification_level=$request->type1;
        $athletes->qualification_description=$request->description;
        $athletes->qualification_year=$request->year;
        $athletes->country_id=$request->type;
        $athletes->qualification_institute=$request->institute;
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
        $athlete= Athlete_qualification::findOrFail($id);
        $athlete->delete();
        Session::flash('success', 'Qualification has been deleted successfully');
        return redirect()->route('athlete_qualification.index');
    }
}
