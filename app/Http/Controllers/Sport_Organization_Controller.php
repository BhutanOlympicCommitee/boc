<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport_Organization;
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
        return view('sport_organization.index',compact('sport_org'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport_organization.create');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('sport_organization.edit',compact('sport'));
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
        // delete data
        $sport = Sport_Organization::findOrFail($id);
        $sport->status=1;
        $sport->save();
       // $sport->delete();
        return redirect()->route('sport_organization.index');
    }
}
