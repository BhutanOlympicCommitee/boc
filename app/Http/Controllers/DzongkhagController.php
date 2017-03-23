<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MstDzongkhag;
use Auth;
use Session;

class DzongkhagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dzongkhag=MstDzongkhag::all();
       return view('dzongkhag_master.index',compact('dzongkhag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dzongkhag_master.create');
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
        'dzongkhag_name'=> 'required',
        'dzongkhag_code' => 'required',
        ]);
        $dzongkhag = new MstDzongkhag;
        $dzongkhag->country_id=$request->type;
        $dzongkhag->dzongkhag_name=$request->dzongkhag_name;
        $dzongkhag->dzongkhag_code=$request->dzongkhag_code;
        $dzongkhag->created_by=Auth::user()->id;
        $dzongkhag->save();
        Session::flash('success', 'Dzongkhag has been created successfully');
        return redirect()->route('dzongkhag_master.index');
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
            $info = MstDzongkhag::find($id);
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
        $dzongkhag=MstDzongkhag::find($id);
        $dzongkhag->country_id=$request->type;
        $dzongkhag->dzongkhag_name= $request->dzongkhag_name;
        $dzongkhag->dzongkhag_code= $request->dzongkhag_code;
        $dzongkhag->save();
        Session::flash('success', 'Dzongkhag has been updated successfully');
        return redirect()->route('dzongkhag_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dzongkhag = MstDzongkhang::findOrFail($id);
        $dzongkhag->status=1;
        $dzongkhag->save();
        return redirect()->route('dzongkhag_master.index');
    }
}
