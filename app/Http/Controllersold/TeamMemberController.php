<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use URL;
use Session;
use App\Tbl_team_member;
use App\Athlete_bioinformation;
use App\Associated_Sport;
use App\Athlete_address;
use App\Tbl_sport_coach;

class TeamMemberController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $team=Athlete_bioinformation::all();
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
       $team->athlete_id=$dat; 
       $team->gamesdetail_id=Session::get('key6');
       $team->created_by=Auth::user()->id;
       $team->updated_by=Auth::user()->id;
       $team->save();
      }
        Session::flash('success', 'team member created successfully');
        return redirect()->route('team_master.index');
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
    public function destroy(Request $request, $id)
    {
        $team_member = Tbl_team_member::where('athlete_id',$id)->get();
        $game_id=$request->hidden_game_id;
        foreach($team_member as $team)
        {
            if($team->gamesdetail_id==$game_id)
            {
               $team->delete();
            }
        }
        Session::flash('success', 'Deleted successfully');
        return redirect()->route('team_master.index');
    }
    public function searchSportCoach(Request $request)
    {
        Session::put('sport_id',$request->sport);
        if(!empty($request->sport))
        {
            $team=Athlete_bioinformation::join('associated__sports','athlete_bioinformations.athlete_associatedSport','associated__sports.sport_id')
                ->select('athlete_bioinformations.*')
                ->where('associated__sports.sport_id','=',$request->sport)
                ->get();
            return view('boc_user.Games.team_master.index',compact('team'));
        }
        else if(!empty($request->federation))
        {
            $federation_id=array();
            $federation=Tbl_sport_coach::select('tbl_sport_coaches.gamesdetail_id')
                ->where('tbl_sport_coaches.federation','=',$request->federation)
                ->pluck('gamesdetail_id');
            $federation=explode(',',$federation);
            foreach($federation as $fed_id)
            {
                $federation_id[]=trim($fed_id,'[]');
            }
            $team=Athlete_bioinformation::join('tbl_team_members','athlete_bioinformations.athlete_id','tbl_team_members.athlete_id')
                ->select('athlete_bioinformations.*')
               ->whereIn('tbl_team_members.gamesdetail_id',$federation_id)
               ->get();
            return view('boc_user.Games.team_master.index',compact('team'));
        }
        else
        {
            $team=Athlete_bioinformation::all();
            return view('boc_user.Games.team_master.index',compact('team'));
        }
    }
    public function searchAthlete(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            Session::put('sport_id',$id);
            return response()->json(Session::get('sport_id'));
        }
    }
}


