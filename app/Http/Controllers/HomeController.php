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
        return view('home');
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
        $sport = Sport_Organization::all();
        $proposed_activity = Tbl_proposed_sport_org_activity::all();
        $coach = Tbl_Coach::all();
        $Training_schedule = TrainingSchedule::all();
        return view('federationdash',['sport'=>$sport,'proposed_activity'=>$proposed_activity,'coach'=>$coach,'Training_schedule'=>$Training_schedule]);
    }
}
