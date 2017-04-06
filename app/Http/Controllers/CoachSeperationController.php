<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoachSeperation;
use Auth;
use Session;

class CoachSeperationController extends Controller
{
   
    public function store(Request $request)
    {
        $seperation = new CoachSeperation;
        $seperation->coach_id=Session::get('key5');
        $seperation->seperation_date=$request->seperation_date;
        $seperation->seperation_comment=$request->seperation_comment;
        $seperation->created_by=Auth::user()->id;
        $seperation->save();
        Session::flash('success','successfully seperated');
        return redirect()->route('coach_master.index');
    }
    
    public function destroy($id)
    {
        // $dzongkhag = MstDz::findOrFail($id);
        // $dzongkhag->status=1;
        // $dzongkhag->save();
        // Session::flash('success', 'Dzongkhag has been deleted successfully');
        // return redirect()->route('dzongkhag_master.index');
    }
   }