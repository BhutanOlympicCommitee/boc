<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ Tbl_sport_org_activities;
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

class ReviewPlanController extends Controller
{
    public function index()
    {
        $review_plan= Tbl_sport_org_activities::all();
       return view('review_plan.index',compact('review_plan'));
    }
    public function create()
    {
        return view('review_plan.create');
    }
    public function getAchievement_update(){
        return view('annual_activity_plan.review_plan.update_achievement');
    }
    
}
