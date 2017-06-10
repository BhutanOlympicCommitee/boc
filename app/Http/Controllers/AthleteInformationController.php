<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete_bioinformation;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Image;
use App\Associated_Sport;
use App\User;
use App\Athlete_address;
use App\Athlete_occupation;
use App\EnumGender;

class AthleteInformationController extends Controller
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
    public function index()
    {

        $associated_sport=array();
        $user=User::where('id',Session::get('user_id'))->first();
        

        if(!empty($_GET['sport']))
        {
            $athlete=Athlete_bioinformation::where('athlete_associatedSport',$_GET[
                'sport'])->get(); 

        }
        else if(!empty($_GET['athlete_name1']))
        {
            $name=explode(' ',$_GET['athlete_name1']);
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
       $athlete=Athlete_bioinformation::select('athlete_bioinformations.*')
       ->where('athlete_bioinformations.athlete_fname','=',$fname) 
       ->where('athlete_bioinformations.athlete_mname','=',$mname)
       ->where('athlete_bioinformations.athlete_lname','=',$lname)
       ->get();
       return view('sport_organization_user.athlete_information.athlete_info.index',compact('athlete'));
      }
  else if(!empty($_GET['athlete_cid'])){
    $athlete=Athlete_bioinformation::where('athlete_cid',$_GET['athlete_cid'])->get();
    }
else 
{
   if($user->role_id==4)
   {
    $associatedSport=Associated_Sport::where('sport_org_id',$user->sport_organization)->pluck('sport_id');
    $associated=explode(',',$associatedSport);
    foreach($associated as $assoc)
    {
        $associated_sport[]=trim($assoc,'[]');
    }
    $athlete=Athlete_bioinformation::whereIn('athlete_associatedSport',$associated_sport)->get();
    return view('sport_organization_user.athlete_information.athlete_info.index',compact('athlete'));
    }
     else{
    $athlete=Athlete_bioinformation::all(); 
   }
   return view('sport_organization_user.athlete_information.athlete_info.index',compact('athlete'));
}

return view('sport_organization_user.athlete_information.athlete_info.index',compact('athlete'));


}

public function create()
{
    return view('sport_organization_user.athlete_information.athlete_info.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
            'cid'=>'unique:athlete_bioinformations,athlete_cid',
            'file'=>'max:500000',
            ]);
        $athlete= new Athlete_bioinformation;
        $athlete->athlete_title=$request->title;
        $athlete->athlete_fname=$request->fname;
        $athlete->athlete_mname=$request->mname;
        $athlete->athlete_lname=$request->lname;
        $athlete->athlete_occupation=$request->occupation;
        $athlete->athlete_dob=$request->dob;
        $athlete->athlete_pob=$request->pob;
        $athlete->athlete_gender=$request->gender;
        $athlete->athlete_height=$request->height;
        $athlete->athlete_weight=$request->weight;
        $athlete->athlete_fathername=$request->fathername;
        $athlete->athlete_passportNo=$request->passportNo;
        $athlete->athlete_cid=$request->cid;
        $athlete->athlete_associatedSport=$request->associatedSport;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $img=Image::make(sprintf('images/%s', $file->getClientOriginalName()));
            $img->resize(300,300)->save();
            $athlete->athlete_photo = $file->getClientOriginalName();
        }
        $athlete->created_by=Auth::user()->id;
        $athlete->save();
        Session::flash('success', 'AthleteInfos has been created successfully');
        Session::put('key',$athlete->athlete_id);
        return redirect()->route('athlete_address.create');
    }

    public function edit($id)
    {
        $athlete = Athlete_bioinformation::findOrFail($id);
        Session::put('key1',$athlete->athlete_id);

        // return to the edit views
        return view('sport_organization_user.athlete_information.athlete_info.edit',compact('athlete'));
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
        $athlete = Athlete_bioinformation::findOrFail($id);
        $athlete->athlete_fname=$request->fname;
        $athlete->athlete_mname=$request->mname;
        $athlete->athlete_lname=$request->lname;
        $athlete->athlete_occupation=$request->occupation;
        $athlete->athlete_dob=$request->dob;
        $athlete->athlete_pob=$request->pob;
        $athlete->athlete_gender=$request->gender;
        $athlete->athlete_height=$request->height;
        $athlete->athlete_weight=$request->weight;
        $athlete->athlete_fathername=$request->fathername;
        $athlete->athlete_passportNo=$request->passportNo;
        $athlete->athlete_cid=$request->cid;
        $athlete->athlete_associatedSport=$request->associatedSport;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $img=Image::make(sprintf('images/%s', $file->getClientOriginalName()));
            $img->resize(300,300)->save();
            $athlete->athlete_photo = $file->getClientOriginalName();
        }
        $athlete->save();


        if(Athlete_address::where('athlete_id',$athlete->athlete_id)->exists())

        {
           return redirect()->route('athlete_address.edit',$athlete->address->address_id)->with('alert-success','Data Has been Updated!');     

       }
       else
       {
        Session::put('athlete_id1',$id);
        return redirect()->route('athlete_address.create');
    } 

}
public function updateAthleteFunction(Request $request)
{
    $update_function=Athlete_bioinformation::findOrFail( $request->hidden_id);
    $update_function->athlete_function=$request->ath_function;
    $update_function->save();
    Session::flash('success', 'athlete_function updated successfully');
    return redirect()->route('team_master.index');
}

public function getOccupation(Request $request)
{
    if($request->ajax()){
        $id = $request->id;
        $info = Athlete_occupation::where('occupation_id', $id)->first();
        return response()->json($info);
    }
}

public function getGender(Request $request)
{
    if($request->ajax()){
        $id = $request->id;
        $info = EnumGender::where('id', $id)->first();
        return response()->json($info);
    }
}
}