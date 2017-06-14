<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fiscal_year;
use Auth;
use Session;

class FiscalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiscal=fiscal_year::all();
        return view('admin.fiscal.index',compact('fiscal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fiscal.create');
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
        $fiscal = new fiscal_year;
        $fiscal->five_yr_plan_id=$request->five_yr_plan_id;
        $fiscal->fiscal_year=$request->fiscal_year;
        $fiscal->created_by=Auth::user()->id;
        $fiscal->save();
        Session::flash('success', 'created successfully');
        return redirect()->route('fiscal.index');
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
            $info = fiscal_year::find($id);
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
        $fiscal = fiscal_year::find($id);
        $fiscal->five_yr_plan_id=$request->five_yr_plan_id;
        $fiscal->fiscal_year=$request->fiscal_year;
        $fiscal -> save();
        Session::flash('success', 'updated successfully');
        return redirect()->route('fiscal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiscal = fiscal_year::findOrFail($id);
        $fiscal ->delete();
        Session::flash('success', 'deleted successfully');
        return redirect()->route('fiscal.index');
    }
}
