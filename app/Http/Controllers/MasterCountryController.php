<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_country;
use Session;
use Auth;

class MasterCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=Mst_country::all();
        return view('country_master.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country_master.create');
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
        'country_name'=> 'required',
        'country_code' => 'required',
        ]);
        $country = new Mst_country;
        $country->country_name=$request->country_name;
        $country->country_code=$request->country_code;
        $country->created_by=Auth::user()->id;
        $country->save();
        Session::flash('success', 'Country has been created successfully');
        return redirect()->route('country_master.index');
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
            $info = Mst_country::find($id);
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
        $id = $request ->edit_id;
        $country = Mst_country::find($id);
        $country ->country_name = $request ->country_name;
        $country ->country_code = $request ->country_code;
        $country -> save();
        Session::flash('success', 'Country has been updated successfully');
        return redirect()->route('country_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Mst_country::findOrFail($id);
        $country->status=1;
        $country->save();
        Session::flash('success', 'Country has been deleted successfully');
        return redirect()->route('country_master.index');
    }
}
