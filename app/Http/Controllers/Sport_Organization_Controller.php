<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport_Organization;
use App\Tbl_proposed_sport_org_activity;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ContactPersonController;
use Session;
use Auth;
use Image;

class Sport_Organization_Controller extends Controller
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
        $sport_org=Sport_Organization::all();
        return view('boc_user.sport_organization_profile.sport_organization.index',compact('sport_org'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boc_user.sport_organization_profile.sport_organization.create');
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
        'org_name' => 'required',
        'abbreviation' => 'required',
        'org_logo' => 'required',
        'org_phone' => 'required',
        'org_fax' => 'required',
        'org_address' => 'required',
        ]);
        $sport = new Sport_Organization;
        $sport->sport_org_type_id=$request->type;
        $sport->sport_org_name=$request->org_name;
        $sport->sport_org_abbreviation=$request->abbreviation;
        $sport->sport_org_webaddress=$request->org_web_address;
        if($request->hasFile('org_logo'))
        {
            $file=$request->file('org_logo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $img=Image::make(sprintf('images/%s', $file->getClientOriginalName()));
            $img->resize(300,300)->save();
            $sport->sport_org_logo=$file->getClientOriginalName();
        }
        $sport->sport_org_logo=$request->org_logo;
        $sport->sport_org_email=$request->org_email;
        $sport->sport_org_phone=$request->org_phone;
        $sport->sport_org_fax=$request->org_fax;
        $sport->sport_org_office_address=$request->org_address;
        $sport->created_by=Auth::user()->id;
        $sport->save();
        Session::flash('success', 'Sport Organization has been created successfully');
        Session::put('key',$sport->sport_org_id);
        return redirect()->route('contact_person.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sport = Sport_Organization::findOrFail($id);
        Session::put('key1',$sport->sport_org_id);

        // return to the edit views
        return view('boc_user.sport_organization_profile.sport_organization.edit',compact('sport'));
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
        
        $sport_org = Sport_Organization::findOrFail($id);
        $sport_org->sport_org_type_id=$request->get('type');
        $sport_org->sport_org_name=$request->org_name;
        $sport_org->sport_org_abbreviation=$request->abbreviation;
        $sport_org->sport_org_webaddress=$request->org_web_address;
        $sport_org->sport_org_logo=$request->org_logo;
        $sport_org->sport_org_email=$request->org_email;
        $sport_org->sport_org_phone=$request->org_phone;
        $sport_org->sport_org_fax=$request->org_fax;
        $sport_org->sport_org_office_address=$request->org_address;
        $sport_org->save();
        if($request->update1=='form1')
        {
           return redirect()->route('sport_organization.index')->with('alert-success','Data Has been Updated!');    
        }
       else
        {
            return redirect()->route('contact_person.edit',$sport_org->contact->sport_org_contact_person_id)->with('alert-success','Data Has been Updated!');  
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
        $sport = Sport_Organization::findOrFail($id);
        $sport->status=1;
        $sport->save();
        Session::flash('success', 'Sport Organization has been deleted successfully');
        return redirect()->route('sport_organization.index');
    }

    // Sport Organization Activities
    public function viewActivities(){
        return view('sport_organization_user.sport_activity_plan.index');
    }

    public function addActivities(Request $request){
        $sport_org_activity = new Tbl_proposed_sport_org_activity;
        $sport_org_activity->weightage_id=Session::get('key');
        $sport_org_activity->activity_name=$request->activity;
        $sport_org_activity->activity_venue=$request->venue;
        $sport_org_activity->quarter_timeline=$request->quarter;
        $sport_org_activity->actual_timeline=$request->actual;
        $sport_org_activity->rgob_budget=$request->rgob_budget;
        $sport_org_activity->external_budget=$request->external_budget;
        $sport_org_activity->external_source=$request->external_source;
        $sport_org_activity->collaborating_agency=$request->collaborating;
        $sport_org_activity->created_by = session('user_id');
        $sport_org_activity->save();
        return redirect()->route('sport_activity_plan.addActivity');
    }

    //list and search activities
     public function search()
    {
        $search=Tbl_proposed_sport_org_activity::all();
        return view('sport_organization_user.search_activity.search',compact('search'));
    }
    public function searchSportOrganization(Request $request)
    {
        $sport_org_type=$request->org_type;
        $sport_org_name=$request->org_name;
        $sport_org_abbreviation=$request->org_abbreviation;
        if(!empty($sport_org_type))
        {
            $sport_org=Sport_Organization::where('sport_org_type_id',$sport_org_type)->get();
            return view('boc_user.sport_organization_profile.sport_organization.index',compact('sport_org'));
        }
        else if(!empty($sport_org_name))
        {
            $sport_org=Sport_Organization::where('sport_org_name',$sport_org_name)->get();
            return view('boc_user.sport_organization_profile.sport_organization.index',compact('sport_org'));
        }
        else if(!empty($sport_org_abbreviation))
        {
            $sport_org=Sport_Organization::where('sport_org_abbreviation',$sport_org_abbreviation)->get();
            return view('boc_user.sport_organization_profile.sport_organization.index',compact('sport_org')); 
        }
        else
            return redirect()->route('sport_organization.index');
    }
}
