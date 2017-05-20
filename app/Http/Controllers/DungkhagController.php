<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dungkhag;
use Auth;
use Session;

class DungkhagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dungkhag= Dungkhag::all();
       return view('admin.dungkhag_master.index',compact('dungkhag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.dungkhag_master.create');
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
        'dungkhag_name'=> 'required',
        ]);
        $dungkhag = new  Dungkhag;
        $dungkhag->dzongkhag_id=$request->type;
        $dungkhag->dungkhag_name=$request->dungkhag_name;
        $dungkhag->created_by=Auth::user()->id;
        $dungkhag->save();
        Session::flash('success', 'Dungkhag has been created successfully');
        return redirect()->route('dungkhag_master.index');
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
            $info = Dungkhag::find($id);
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
        $dungkhag= Dungkhag::find($id);
        $dungkhag->dzongkhag_id=$request->type;
        $dungkhag->dungkhag_name= $request->dungkhag_name;
        $dungkhag->save();
        Session::flash('success', 'Dungkhag has been updated successfully');
        return redirect()->route('dungkhag_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dungkhag =  Dungkhag::findOrFail($id);
        $dungkhag->status=1;
        $dungkhag->save();
        Session::flash('success', 'Dungkhag has been deleted successfully');
        return redirect()->route('dungkhag_master.index');
    }
}
