<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_address;
use App\Dungkhag;
use App\Gewog;
use App\Tbl_athlete_medical;
use Auth;
use Session;

class AthleteAddressController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport_organization_user.athlete_information.athlete_address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                // 'phone' => 'unique:athlete_addresses,Caddress_phone',
                'mobile' => 'unique:athlete_addresses,Caddress_mobile',
            ]);
        $athlete= new Athlete_address;
        if(!empty(Session::get('athlete_id1')))
        {
            $athlete->athlete_id=Session::get('athlete_id1');
            Session::forget('athlete_id1');
        }
        else
        {
           $athlete->athlete_id=Session::get('key'); 
        }
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
       Session::flash('success', 'Athleteaddress has been created successfully');
       if(Tbl_athlete_medical::where('athlete_id',$athlete->athlete_id)->exists())
        {
             return redirect()->route('athlete_medical.edit',$athlete->medical->medical_id)->with('alert-success','Data Has been Updated!');  

        }
        else
        {
            Session::put('athlete_id4',$athlete->athlete_id);
            return redirect()->route('athlete_medical.create');
        } 
    }


     public function edit($id)
    {
        $athlete = Athlete_address::findOrFail($id);
        Session::put('key2',$athlete->address_id);

        // return to the edit views
        return view('sport_organization_user.athlete_information.athlete_address.edit',compact('athlete'));
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
        $athlete = Athlete_address::findOrFail($id);
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
        $athlete->save();

        if(Tbl_athlete_medical::where('athlete_id',$athlete->athlete_id)->exists())
        {
             return redirect()->route('athlete_medical.edit',$athlete->medical->medical_id)->with('alert-success','Data Has been Updated!');  

        }
        else
        {
            Session::put('athlete_id2',$athlete->athlete_id);
            return redirect()->route('athlete_medical.create');
        } 
        //return redirect()->route('athlete_medical.edit',$athlete->medical->medical_id)->with('alert-success','Data Has been Updated!'); 
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
    public function view1(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Gewog::where('dzongkhag_id', $id)->get();
            return response()->json($info);
        }
    }
}
