<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Tbl_game_detail;

class GamesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('boc_user.Games.games_master.create');
    }

    public function store(Request $request)
    {
        $games= new Tbl_game_detail;
        $games->year=$request->year;
        $games->type=$request->type;
        $games->name=$request->name;
        $games->country=$request->country;
        $games->venue=$request->venue;
        $games->startdate=$request->startdate;
        $games->enddate=$request->enddate;
        $games->comments=$request->comments;
        $games->created_by=Auth::user()->id;
        $games->updated_by=Auth::user()->id;
        $games->save();
        Session::put('key6',$games->gamesdetail_id);
        Session::flash('success', 'Games info has been created successfully');
        return redirect()->route('sport_coach_master.index');
    }
}

