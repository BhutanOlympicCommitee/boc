<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_sport_org_advisory;
use Session;
use Auth;

class AdvisoryBoardController extends Controller
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
        $advisory=Tbl_sport_org_advisory::all();
        return view('boc_user.sport_organization_profile.advisory_board_members.index',compact('advisory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boc_user.sport_organization_profile.advisory_board_members.create');
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
        'ad_name'=> 'required',
        'ad_designation' => 'required',
        'ad_phone' => 'required|unique:tbl_sport_org_advisories,mg_member_phone',
        'ad_email' => 'required',
        'ad_mobile' => 'required|unique:tbl_sport_org_advisories,mg_member_mobile',
        'ad_appointment' => 'required',
        ]);

        $advisory = new Tbl_sport_org_advisory;
        $advisory->sport_org_id=Session::get('key');
        $advisory->ad_member_name=$request->ad_name;
        $advisory->ad_member_designation=$request->ad_designation;
        $advisory->mg_member_phone=$request->ad_phone;
        $advisory->mg_member_email=$request->ad_email;
        $advisory->mg_member_mobile=$request->ad_mobile;
        $advisory->appointment_date=$request->ad_appointment;
        $advisory->created_by=Auth::user()->id;
        $advisory->save();
        Session::flash('success', 'Advisory Board Members for sport organization has been created successfully');
        return redirect()->route('sport_organization.index');
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
            $info = Tbl_sport_org_advisory::find($id);
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
        $this->validate($request,[
            'ad_phone' => 'required|unique:tbl_sport_org_advisories,mg_member_phone,'.$id.',ad_member_id',
            'ad_mobile'=>'required|unique:tbl_sport_org_advisories,mg_member_mobile,'.$id.',ad_member_id',
            ]);
        $advisory_info = Tbl_sport_org_advisory::findOrFail($id);
        $advisory_info->ad_member_name=$request->ad_name;
        $advisory_info->ad_member_designation=$request->ad_designation;
        $advisory_info->mg_member_phone=$request->ad_phone;
        $advisory_info->mg_member_email=$request->ad_email;
        $advisory_info->mg_member_mobile=$request->ad_mobile;
        $advisory_info->appointment_date=$request->ad_appointment;
        $advisory_info->save(); 
        return redirect()->route('advisory_board_members.index')->with('alert-success','Data Has been Updated!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advisory = Tbl_sport_org_advisory::findOrFail($id);
        $advisory->status=1;
        $advisory->save();
        return redirect()->route('advisory_board_members.index');
    }
}
