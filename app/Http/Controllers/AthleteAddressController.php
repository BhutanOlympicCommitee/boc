<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_address;
use App\Dungkhag;
use App\Gewog;
use Auth;
use Session;

class AthleteAddressController extends Controller
{
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
                'phone' => 'unique:athlete_addresses,Caddress_phone',
                'mobile' => 'unique:athlete_addresses,Caddress_mobile',
            ]);
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
    public function view1(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Gewog::where('dzongkhag_id', $id)->get();
            return response()->json($info);
        }
    }
}
