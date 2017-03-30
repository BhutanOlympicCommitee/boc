<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Associated_Sport;
use Session;
use Auth;

class AssociatedSportController extends Controller
{
     public function index()
    {
        $asport= Associated_Sport::all();
       return view('sport_organization_user.associated_sport_types.index',compact('asport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('sport_organization_user.associated_sport_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
        'sport_name'=> 'required',
        ]);
        $asport = new  Associated_Sport;
        $asport->sport_name=$request->sport_name;
        $asport->created_by=Auth::user()->id;
        $asport->save();
        Session::flash('success', 'Sport has been created successfully');
        return redirect()->route('associated_sport_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $id=$request->edit_id;
        $asport= Associated_Sport::find($id);
        $asport->sport_name= $request->sport_name;
        $asport->save();
        Session::flash('success', 'Gewog has been updated successfully');
        return redirect()->route('associated_sport_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asport =  Associated_Sport::findOrFail($id);
        $asport->delete();
        Session::flash('success', 'Gewog has been deleted successfully');
        return redirect()->route('associated_sport_types.index');
    }
}
