<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_bioinformation;
use App\Athlete_address;
use App\Associated_Sport;
class TrainingInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athlete_info=Athlete_bioinformation::all();
        return view('sport_organization_user.training_information.index',compact('athlete_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport_organization_user.training_information.create');
    }
    
    public function trainingAttendanceIndex()
    {
        return view('sport_organization_user.training_information.attendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('sport_organization_user.training_information.create');
    }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
