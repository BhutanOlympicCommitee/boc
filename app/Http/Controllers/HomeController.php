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
        $countries = Mst_country::all();
        $dzongkhag = MstDzongkhag::all();
        $users = User::all();
        return view('home',['countries'=>$countries,'dzongkhags'=>$dzongkhag,'users'=>$users]);
    }
}
