<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_sport_org_activities;

class Sport_org_activitiesController extends Controller
{
    public function index()
    {
    	$sport_org_plan=Tbl_sport_org_activities::all();
    	return view('annual_activity_plan.sport_activity_plan.index',compact('sport_org_plan'));
    }
}
