<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Tbl_team_member;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team=Tbl_team_member::all();
       return view('boc_user.Games.team_master.index',compact('team'));
    }

    
    public function create()
    {
       return view('boc_user.Games.team_master.create');
    }

   
    public function store(Request $request)
    {
       $data = $request->get('select');
       foreach ($data as $dat) {
       	
        $team = new Tbl_team_member;
        $team->federation=$request->federation;
        $team->sport=$request->sport;
        $team->athlete_name=$request->athlete_name;
        $team->athlete_id->$dat;
        $team->created_by=Auth::user()->id;
        $team->updated_by=Auth::user()->id;
        $team->save();
        Session::flash('success', 'created successfully');
        return redirect()->route('team_master.index');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Athlete_bioinformation::find($id);
            return response()->json($info);
        }
    }
   public function show(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Athlete_address::where('athlete_id',$id)->first();
            return response()->json($info);
        }
    }

    public function showAssociatedSport(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Associated_Sport::where('sport_id',$id)->first();
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
        // $id=$request->edit_id;
        // $sportcoach = Tbl_sport_coach::findOrFail($id);
        // $sportcoach->federation=$request->federation;
        // $sportcoach->sport=$request->sport;
        // $sportcoach->coach=$request->coach;
        // $sportcoach->comments=$request->comments;
        // $sportcoach->created_by=Auth::user()->id;
        // $sportcoach->updated_by=Auth::user()->id;
        // $sportcoach->save();
        // Session::flash('success', 'Updated successfully');
        // return redirect()->route('sport_coach_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Tbl_team_member::findOrFail($id);
        $team->status=1;
        $team->save();
        Session::flash('success', 'Deleted successfully');
        return redirect()->route('team_master.index');
    }
}


