<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_address;
use App\Dungkhag;
use Auth;
use Session;

class AthleteAddressController extends Controller
{
      public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('athlete_address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete= new Athlete_address;
        $athlete->athlete_id=Session::get('key');
        $athlete->Paddress_dzongkhag=$request->type1;
        $athlete->Paddress_dungkhag=$request->dungkhag;
        $athlete->Paddress_gewog=$request->gewog;
        $athlete->Paddress_village=$request->village;
        $athlete->Caddress_dzongkhag=$request->type;
        $athlete->Caddress_dungkhag=$request->Cdungkhag;
        $athlete->Caddress_email=$request->email;
        $athlete->Caddress_phone=$request->phone;
        $athlete->Caddress_mobile=$request->mobile;
        $athlete->Caddress_contactAddress=$request->caddress;
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'AthleteInfos has been created successfully');
        return redirect()->route('athlete_qualification.create');
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
            $info = Dungkhag::where('dzongkhag_id', $id)->get();
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
        $athletes= new Athlete_address;
         $athletes = Athlete_address::findOrFail($id);
        Session::put('key2',$athletes->address_id);

        // return to the edit views
        return view('athlete_address.edit',compact('athletes'));
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
        $athletes = Athlete_address::findOrFail($id);
        $athletes->dzongkhag_id=$request->type1;
        $athletes->dungkhag_id=$request->dungkhag;
        $athletes->Paddress_gewog=$request->gewog;
        $athletes->Paddress_village=$request->village;
        $athletes->dzongkhag_id=$request->type;
        $athletes->dungkhag_id=$request->Cdungkhag;
        $athletes->Caddress_email=$request->email;
        $athletes->Caddress_phone=$request->phone;
        $athletes->Caddress_mobile=$request->mobile;
        $athletes->Caddress_contactAddress=$request->caddress;
        $athletes->save();
        if($request->update1=='form1')
        {
           return redirect()->route('athlete_qualification.index')->with('alert-success','Data Has been Updated!');    
        }
       else
        {
            return redirect()->route('athlete_qualification.edit')->with('alert-success','Data Has been not Updated!');  
        }    
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
