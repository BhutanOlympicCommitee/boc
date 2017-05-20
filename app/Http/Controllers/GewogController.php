<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gewog;
use Auth;
use Session;

class GewogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $gewog= Gewog::all();
       return view('admin.gewog_master.index',compact('gewog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.gewog_master.create');
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
        'type'=> 'required',
        'gewog_name'=> 'required',
        ]);
        $gewog = new  Gewog;
        $gewog->dzongkhag_id=$request->type;
        $gewog->gewog_name=$request->gewog_name;
        $gewog->created_by=Auth::user()->id;
        $gewog->save();
        Session::flash('success', 'Gewog has been created successfully');
        return redirect()->route('gewog_master.index');
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
            $info = Gewog::find($id);
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
        $gewog= Gewog::find($id);
        $gewog->dzongkhag_id=$request->type;
        $gewog->gewog_name= $request->gewog_name;
        $gewog->save();
        Session::flash('success', 'Gewog has been updated successfully');
        return redirect()->route('gewog_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gewog =  Gewog::findOrFail($id);
        $gewog->status=1;
        $gewog->save();
        Session::flash('success', 'Gewog has been deleted successfully');
        return redirect()->route('gewog_master.index');
    }
}
