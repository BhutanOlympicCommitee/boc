<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_sport_org_contact_person;
use Session;
use Auth;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('boc_user.sport_organization_profile.contact_person.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boc_user.sport_organization_profile.contact_person.create');
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
        'contact_name' => 'required',
        'contact_phone'=>'required',
        'contact_mobile'=>'required',
        ]);
        $contact = new Tbl_sport_org_contact_person;
        $contact->sport_org_id=Session::get('key');
        $contact->contact_person_name=$request->contact_name;
        $contact->contact_person_designation=$request->contact_designation;
        $contact->contact_person_phone=$request->contact_phone;
        $contact->contact_person_fax=$request->contact_fax;
        $contact->contact_person_email=$request->contact_email;
        $contact->contact_person_mobile=$request->contact_mobile;
        $contact->created_by=Auth::user()->id;
        $contact->save();
        Session::flash('success', 'Contact person for sport organization has been created successfully');
        return redirect()->route('management_committee.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Tbl_sport_org_contact_person::findOrFail($id);
        Session::put('key2',$contact->sport_org_contact_person_id);
        // return to the edit views
        return view('boc_user.sport_organization_profile.contact_person.edit',compact('contact'));
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
        
        $contact = Tbl_sport_org_contact_person::findOrFail($id);
        $contact->contact_person_name=$request->contact_name;
        $contact->contact_person_designation=$request->contact_designation;
        $contact->contact_person_phone=$request->contact_phone;
        $contact->contact_person_fax=$request->contact_fax;
        $contact->contact_person_email=$request->contact_email;
        $contact->contact_person_mobile=$request->contact_mobile;
        $contact->save();
        if($request->update1=='form1')
        {
             return redirect()->route('sport_organization.index')->with('alert-success','Data Has been Updated!');   
        }
       else
        {
            return redirect()->route('management_committee.index')->with('alert-success','Data Has been Updated!');  
        }  
    }
}
