<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport_Organization;
use App\Tbl_sport_org_activities;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ContactPersonController;
use Session;
use Auth;

class Sport_Organization_Controller extends Controller
{
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
        $sport_org_activity = new Tbl_sport_org_activities;
        $sport_org_activity->year_id = Input::get('year');
        $sport_org_activity->skra_id = Input::get('skra');

        //default sport org id inserted have to modify
        $sport_org_activity->sport_org_id = 1;

        //default value of submit status
        $sport_org_activity->submit_status = 1;

        $sport_org_activity->skra_activity_id = Input::get('skra_activity');
        $sport_org_activity->activity_name = Input::get('activity');
        $sport_org_activity->activity_baseline = Input::get('baseline');
        $sport_org_activity->activity_target = Input::get('target');
        $sport_org_activity->activity_venue = Input::get('venue');
        $sport_org_activity->activity_timeline = Input::get('timeline');
        $sport_org_activity->proposed_capital_budget = Input::get('proposed_capital_budget');
        $sport_org_activity->proposed_recurring_budget = Input::get('proposed_recurring_budget');
        $sport_org_activity->collaborating_agency = Input::get('collaborating_agency');
        $sport_org_activity->remarks = Input::get('remarks');
        $sport_org_activity->created_by = session('user_id');
        $sport_org_activity->save();
        return redirect()->route('sport_org_activity');
    }

    public function updateActivities(Request $request){
        $id = Input::get('activity_id');
        $year_id = Input::get('year');
        $skra_id = Input::get('skra');

        $skra_activity_id = Input::get('skra_activity');
        $activity_name = Input::get('activity');
        $activity_baseline = Input::get('baseline');
        $activity_target = Input::get('target');
        $activity_venue = Input::get('venue');
        $activity_timeline = Input::get('timeline');
        $proposed_capital_budget = Input::get('proposed_capital_budget');
        $proposed_recurring_budget = Input::get('proposed_recurring_budget');
        $collaborating_agency = Input::get('collaborating_agency');
        $remarks = Input::get('remarks');
        $created_by = session('user_id');

        $sport_org_activity = new Tbl_sport_org_activities;
        $sport_org_activity::where('activity_id',$id)
            ->update([
                'year_id' => $year_id,
                'skra_id'=> $skra_id,
                'skra_activity_id' =>$skra_activity_id,
                'activity_name' =>$activity_name,
                'activity_baseline' =>$activity_baseline,
                'activity_target' =>$activity_target,
                'activity_venue' =>$activity_venue,
                'activity_timeline' =>$activity_timeline,
                'proposed_capital_budget' =>$proposed_capital_budget,
                'proposed_recurring_budget' =>$proposed_recurring_budget,
                'collaborating_agency' =>$collaborating_agency,
                'remarks' =>$remarks,
                'created_by'=>$created_by
                ]);
        return redirect()->route('sport_org_activity');
    }
    public function deleteActivities($id){
        $sport_activity = new Tbl_sport_org_activities;
        $sport_activity::where('activity_id', $id)->delete();
        return redirect()->route('sport_org_activity');
    }
}
