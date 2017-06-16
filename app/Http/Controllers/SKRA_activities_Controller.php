<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tbl_SKRA_activities;
use App\Tbl_UpdateSportActivity;
use App\Tbl_proposed_sport_org_activity;
use App\Tbl_SKRA;
use Session;
use Auth;
use App\User;
use App\Sport_Organization;
use App\fiscal_year;

class SKRA_activities_Controller extends Controller
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
        $skra_activities=Tbl_SKRA_activities::all();
        return view('common_view.skra_activities.index',compact('skra_activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('common_view.skra_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validation
         $this->validate($request,[
        'type'=> 'required',
        'skra'=> 'required',
        'skra_activity_name' => 'required',
        ]);
        $skra_activity = new Tbl_SKRA_activities;
        $skra_activity->five_yr_plan_id=$request->five_year;
        $skra_activity->sport_org_id=$request->type;
        $skra_activity->skra_id=$request->skra;
        $skra_activity->SKRA_activity=$request->skra_activity_name;
        $skra_activity->SKRA_description=$request->description;
        $skra_activity->created_by=Auth::user()->id;
        $skra_activity->save();
        Session::flash('success', 'SKRA has been created successfully');
        
        return redirect()->route('skra_activities.index');
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
            $info = Tbl_SKRA::where('five_yr_plan_id', $id)->get();
            //var_dump($info);
            return response()->json($info);
        }
    }
    public function viewBocProgram(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $user=User::where('id',Session::get('user_id'))->first();
            $info = Tbl_SKRA_activities::where('skra_id',$id)
             ->where('sport_org_id',$user->sport_organization)
             ->get();

            //var_dump($info);
            return response()->json($info);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skras_edit=Tbl_SKRA_activities::findOrFail($id);
        return view('common_view.skra_activities.edit',compact('skras_edit'));
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
        $skra_activity = Tbl_SKRA_activities::findOrFail($id);
        $skra_activity->five_yr_plan_id=$request->five_year;
        $skra_activity->sport_org_id=$request->type;
        $skra_activity->skra_id=$request->skra;
        $skra_activity->SKRA_activity=$request->skra_activity_name;
        $skra_activity->SKRA_description=$request->description;
        $skra_activity->save();
        return redirect()->route('skra_activities.index')->with('alert-success','Data Has been Updated!');   
    }

      public function destroy($id)
    {
         $skra_activity = Tbl_SKRA_activities::findOrFail($id);
         $skra_activity->status=1;
         $skra_activity->save();
         return redirect()->route('skra_activities.index')->with('success','Data Has been deleted');       
    }

    public function searchAKRAactivity(Request $request)
    {
        $five_yr=$request->five_yr_plan_id;
        $fiscal_yr=$request->fiscal_id;
        $akra=$request->skra_id;
        $boc_program=$request->skra_activity_id;
        if(!empty($five_yr))
        {
             $skra1=array();
            $user=User::where('id',Session::get('user_id'))->first();
            $boc_program=Tbl_SKRA_activities::where('sport_org_id',$user->sport_organization)->where('five_yr_plan_id',$five_yr)->pluck('skra_activity_id');
            $skra_activity1=explode(',',$boc_program);
            foreach($skra_activity1 as $skra)
            {
                $skra1[]=trim($skra,'[]');
            }
            $sport_update=Tbl_UpdateSportActivity::whereIn('skra_activity_id', $skra1)->get();
            $search=Tbl_proposed_sport_org_activity::join('tbl__update_sport_activities','tbl_proposed_sport_org_activities.weightage_id','tbl__update_sport_activities.id')
                ->select('tbl_proposed_sport_org_activities.*')
                ->whereIn('tbl__update_sport_activities.skra_activity_id',$skra1)
                ->get();
            return view('sport_organization_user.search_activity.search',compact('search','sport_update'));
        }
        else if(!empty($fiscal_yr))
        {
            $skra1=array();
             $user=User::where('id',Session::get('user_id'))->first();
             $akra=DB::table('tbl__s_k_r_a_activities')
                ->join('fiscal_years','tbl__s_k_r_a_activities.five_yr_plan_id','fiscal_years.five_yr_plan_id')
                ->select('tbl__s_k_r_a_activities.*')
                ->where('fiscal_years.fiscal_id','=',$fiscal_yr)
                ->where('tbl__s_k_r_a_activities.sport_org_id','=',$user->sport_organization)
                ->pluck('skra_activity_id');
            $skra_activity1=explode(',',$akra);
            foreach($skra_activity1 as $skra)
            {
                $skra1[]=trim($skra,'[]');
            }
             $sport_update=Tbl_UpdateSportActivity::whereIn('skra_activity_id', $skra1)->get();
            $search=Tbl_proposed_sport_org_activity::join('tbl__update_sport_activities','tbl_proposed_sport_org_activities.weightage_id','tbl__update_sport_activities.id')
                ->select('tbl_proposed_sport_org_activities.*')
                ->whereIn('tbl__update_sport_activities.skra_activity_id',$skra1)
                ->where('tbl_proposed_sport_org_activities.fiscal_id',$fiscal_yr)
                ->get();
            return view('sport_organization_user.search_activity.search',compact('search','sport_update'));

        }
        else if(!empty($akra))
        {
           $skra1=array();
           $user=User::where('id',Session::get('user_id'))->first();
           $akra=DB::table('tbl__s_k_r_a_activities')
                ->join('tbl__s_k_r_as','tbl__s_k_r_a_activities.skra_id','tbl__s_k_r_as.skra_id')
                ->select('tbl__s_k_r_a_activities.*')
                ->where('tbl__s_k_r_a_activities.skra_id','=',$akra)
                ->where('tbl__s_k_r_a_activities.sport_org_id','=',$user->sport_organization)
                ->pluck('skra_activity_id');
             $skra_activity1=explode(',',$akra);
            foreach($skra_activity1 as $skra)
            {
                $skra1[]=trim($skra,'[]');
            }
           $sport_update=Tbl_UpdateSportActivity::whereIn('skra_activity_id', $skra1)->get();
           $search=Tbl_proposed_sport_org_activity::join('tbl__update_sport_activities','tbl_proposed_sport_org_activities.weightage_id','tbl__update_sport_activities.id')
                ->select('tbl_proposed_sport_org_activities.*')
                ->whereIn('tbl__update_sport_activities.skra_activity_id',$skra1)
                ->get();
            return view('sport_organization_user.search_activity.search',compact('search','sport_update'));
        }
        else if(!empty($boc_program))
        {
            $user=User::where('id',Session::get('user_id'))->first();
            $akra_activity=Tbl_SKRA_activities::where('skra_activity_id',$boc_program)
            ->where('sport_org_id',$user->sport_organization)
            ->pluck('skra_activity_id');
            $akra_activity_id=trim($akra_activity,'[]');
            $sport_update=Tbl_UpdateSportActivity::where('skra_activity_id', $akra_activity_id)->get(); 
            $search=DB::table('tbl__update_sport_activities') 
                 ->join('tbl_proposed_sport_org_activities','tbl__update_sport_activities.id','tbl_proposed_sport_org_activities.weightage_id')
                 ->select('tbl_proposed_sport_org_activities.*')
                 ->where('tbl__update_sport_activities.skra_activity_id','=', $akra_activity_id)
                 ->get();
             return view('sport_organization_user.search_activity.search',compact('search','sport_update'));
        }
        else
        return redirect()->route('search_activity.search');
            
}
}
