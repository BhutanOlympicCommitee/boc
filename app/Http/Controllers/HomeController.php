<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MstDzongkhag;
use App\Mst_country;
use App\Sport_Organization;
use App\Gewog;
use App\Tbl_proposed_sport_org_activity;
use App\Tbl_Coach;
use App\TrainingSchedule;
use App\Associated_Sport;
use App\Tbl_SKRA;
use App\Tbl_SKRA_activities;
use App\Athlete_bioinformation;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sport_organization=Sport_Organization::all();
        $sport=Associated_Sport::all();
        $akra=Tbl_SKRA::all();
        $boc_program=Tbl_SKRA_activities::all();
        return view('home',compact('sport_organization','sport','akra','boc_program'));

    }
    public function admin()
    {
        $countries = Mst_country::all();
        $dzongkhag = MstDzongkhag::all();
        $users = User::all();
        $gewogs = Gewog::all();
        return view('admin.dashboard',['countries'=>$countries,'dzongkhags'=>$dzongkhag,'users'=>$users,'gewogs'=>$gewogs]);
    }
    public function boc(){
        return view('home');
    }
    public function federationDashboard()
    {
        //to display athlete of user
        $associated=array();
        $user=User::where('id',Session::get('user_id'))->first();
        $associated_sport=Associated_Sport::where('sport_org_id',$user->sport_organization)->pluck('sport_id');
        $associated_sport1=explode(',',$associated_sport);
        foreach($associated_sport1 as $assoc)
        {
            $associated[]=trim($assoc,'[]');
        }
        $athlete_info= Athlete_bioinformation::whereIn('athlete_associatedSport',$associated)->get();

        //to display the sport organization activities of user
        $skra1=array();
        $boc_program=Tbl_SKRA_activities::where('sport_org_id',$user->sport_organization)->pluck('skra_activity_id');
        $skra_activity1=explode(',',$boc_program);
        foreach($skra_activity1 as $skra)
        {
            $skra1[]=trim($skra,'[]');
        }
        $proposed_activity=Tbl_proposed_sport_org_activity::join('tbl__update_sport_activities','tbl_proposed_sport_org_activities.weightage_id','tbl__update_sport_activities.id')
            ->select('tbl_proposed_sport_org_activities.*')
            ->whereIn('tbl__update_sport_activities.skra_activity_id',$skra1)
            ->get();

        //display the coach information of user
        $coach = Tbl_Coach::where('sport_org_id',$user->sport_organization)->get();

        //returns the training schedule of user
        $coach_id1=array();
        $coach=Tbl_Coach::where('sport_org_id',$user->sport_organization)->pluck('coach_id');
        $coach_id=explode(',',$coach);
        foreach($coach_id as $coach1)
        {
            $coach_id1[]=trim($coach1,'[]');
        }
        $Training_schedule=TrainingSchedule::whereIn('coach_id',$coach_id1)->get();

        return view('federationdash',['athlete_info'=>$athlete_info,'proposed_activity'=>$proposed_activity,'coach'=>$coach,'Training_schedule'=>$Training_schedule]);
    }
}
