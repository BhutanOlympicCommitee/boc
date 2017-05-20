<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use App\Tbl_Coach;

class CoachController extends Controller
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
        $coach->coach_title=$request->coach_title;
        $coach->coach_fname=$request->coach_fname;
        $coach->coach_mname=$request->coach_mname;
        $coach->coach_lname=$request->coach_lname;
        $coach->coach_dob=$request->coach_dob;
        $coach->coach_nationality=$request->type;
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
        Session::put('key5',$coach->coach_id);
        return redirect()->route('coach_master.index');
    }
    

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Tbl_Coach::where('coach_id',$id)->first();
            return response()->json($info);
        }
    }
   
    
   public function update(Request $request)
    {
        $id=$request->edit_id;
        $coach=Tbl_Coach::find($id);
        $coach->coach_title=$request->coach_title;
        $coach->coach_fname=$request->coach_fname;
        $coach->coach_mname=$request->coach_mname;
        $coach->coach_lname=$request->coach_lname;
        $coach->coach_dob=$request->coach_dob;
        $coach->coach_nationality=$request->type;
        $coach->coach_phone=$request->coach_phone;
        $coach->coach_mobile=$request->coach_mobile;
        $coach->coach_email=$request->coach_email;
        $coach->coach_passport=$request->coach_passport;
        $coach->coach_appointmentDate=$request->coach_appointmentDate;
        $coach->coach_expiryDate=$request->coach_expiryDate;
        $coach->coach_contactAddress=$request->coach_contactAddress;
        $coach->coach_type=$request->coach_type;
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
    public function searchCoachInformation(Request $request)
    {
        if(!empty($request->coach_appointmentDate))
        {
            $coach=Tbl_Coach::where('coach_appointmentDate',$request->coach_appointmentDate)->get();
           return view('sport_organization_user.coach_master.index',compact('coach'));   
        }
        else if(!empty($request->coach_expiryDate))
        {
            $coach=Tbl_Coach::where('coach_expiryDate',$request->coach_expiryDate)->get();
            return view('sport_organization_user.coach_master.index',compact('coach'));
        }
        else if(!empty($request->coach_id))
        {
            $coach=Tbl_Coach::where('coach_id',$request->coach_id)->get();
            return view('sport_organization_user.coach_master.index',compact('coach'));
        }
        else if(!empty($request->coach_name))
        {
           $name=explode(' ',$request->coach_name);
           $array_size=sizeof($name);
           if($array_size==3)
           {
                $fname=$name[0];
                $mname=$name[1];
                $lname=$name[2];
           }
           else if($array_size==2)
           {
             $fname=$name[0];
             $mname=' ';
             $lname=$name[1];
           }
           else if($array_size==1)
           {
              $fname=$name[0];
              $mname=' ';
              $lname=' ';
           }
           
           $coach=Tbl_Coach::select('tbl__coaches.*')
                ->where('tbl__coaches.coach_fname','=',$fname) 
                ->where('tbl__coaches.coach_mname','=',$mname)
                ->where('tbl__coaches.coach_lname','=',$lname)
                ->get();
            return view('sport_organization_user.coach_master.index',compact('coach'));
        }
        else
            $coach=Tbl_Coach::all();
            return view('sport_organization_user.coach_master.index',compact('coach')); 
    }
}
