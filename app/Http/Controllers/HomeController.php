<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MstDzongkhag;
use App\Mst_country;

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
        return view('admin.dashboard',['countries'=>$countries,'dzongkhags'=>$dzongkhag,'users'=>$users]);
    }
    public function boc(){
        return view('home');
    }

}
