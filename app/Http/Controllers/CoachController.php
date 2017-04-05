<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Tbl_Coach;

class CoachController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coach=Tbl_Coach::all();
       return view('sport_organization_user.coach_master.index',compact('coach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('sport_organization_user.coach_master.create');
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
       
        $coach = new Tbl_Coach;
        $coach->coach_id=$request->coach_id;
        $coach->coach_title=$request->coach_title;
        $coach->coach_fname=$request->coach_fname;
        $coach->coach_mname=$request->coach_mname;
        $coach->coach_lname=$request->coach_lname;
        $coach->coach_dob=$request->coach_dob;
        $coach->country_id=$request->type;
        $coach->coach_phone=$request->coach_phone;
        $coach->coach_mobile=$request->coach_mobile;
        $coach->coach_email=$request->coach_email;
        $coach->coach_passport=$request->coach_passport;
        $coach->coach_appointmentDate=$request->coach_appointmentDate;
        $coach->coach_expiryDate=$request->coach_expiryDate;
        $coach->coach_contactAddress=$request->coach_contactAddress;
        $coach->coach_type=$request->coach_type;
        $coach->created_by=Auth::user()->id;
        $coach->save();
        Session::flash('success', 'created successfully');
        return redirect()->route('coach_master.index');
    }

    public function storeSeperation(Request $request)
    {

        $coach = new Tbl_Coach;
        $coach->coach_id=$request->coach_id;
        $coach->coach_title=$request->coach_title;

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
            $info = Tbl_Coach::find($id);
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
        $coach=Tbl_Coach::find($id);
        $coach->coach_id=$request->coach_id;
        $coach->coach_title=$request->coach_title;
        $coach->coach_fname=$request->coach_fname;
        $coach->coach_mname=$request->coach_mname;
        $coach->coach_lname=$request->coach_lname;
        $coach->coach_dob=$request->coach_dob;
        $coach->country_id=$request->type;
        $coach->coach_phone=$request->coach_phone;
        $coach->coach_mobile=$request->coach_mobile;
        $coach->coach_email=$request->coach_email;
        $coach->coach_passport=$request->coach_passport;
        $coach->coach_appointmentDate=$request->coach_appointmentDate;
        $coach->coach_expiryDate=$request->coach_expiryDate;
        $coach->coach_contactAddress=$request->coach_contactAddress;
        $coach->coach_type=$request->coach_type;
        $coach->coach_type=$request->coach_type1;
        $coach->save();
        Session::flash('success', 'updated successfully');
        return redirect()->route('coach_master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $dzongkhag = MstDz::findOrFail($id);
        // $dzongkhag->status=1;
        // $dzongkhag->save();
        // Session::flash('success', 'Dzongkhag has been deleted successfully');
        // return redirect()->route('dzongkhag_master.index');
    }
}
