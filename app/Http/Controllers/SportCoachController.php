<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Tbl_sport_coach;

class SportCoachController extends Controller
{
    
    public function index()
    {
        $sportcoach=Tbl_sport_coach::all();
       return view('boc_user.Games.sport_coach_master.index',compact('sportcoach'));
    }

    
    public function create()
    {
       return view('boc_user.Games.sport_coach_master.create');
    }

   
    public function store(Request $request)
    {
        $sportcoach = new Tbl_sport_coach;
        $sportcoach->gamesdetail_id=Session::get('key6');
        $sportcoach->federation=$request->federation;
        $sportcoach->sport=$request->sport;
        $sportcoach->coach=$request->coach;
        $sportcoach->comments=$request->comments;
        $sportcoach->created_by=Auth::user()->id;
        $sportcoach->updated_by=Auth::user()->id;
        $sportcoach->save();
        Session::flash('success', 'sport coach created successfully');
        return redirect()->route('sport_coach_master.index');
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
            $info = Tbl_sport_coach::find($id);
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
        $sportcoach = Tbl_sport_coach::findOrFail($id);
        $sportcoach->gamesdetail_id=Session::get('key6');
        $sportcoach->federation=$request->federation;
        $sportcoach->sport=$request->sport;
        $sportcoach->coach=$request->coach;
        $sportcoach->comments=$request->comments;
        $sportcoach->created_by=Auth::user()->id;
        $sportcoach->updated_by=Auth::user()->id;
        $sportcoach->save();
        Session::flash('success', 'Updated successfully');
        return redirect()->route('sport_coach_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sportcoach = Tbl_sport_coach::findOrFail($id);
        $sportcoach->status=1;
        $sportcoach->save();
        Session::flash('success', 'Deleted successfully');
        return redirect()->route('sport_coach_master.index');
    }
}

