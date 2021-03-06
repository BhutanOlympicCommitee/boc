<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
    	//dd($request->all());
    	if(Auth::attempt([
    		'emp_id' =>$request->emp_id,
    		'password' => $request->password
    		])){
    		$user = User::where('emp_id',$request->emp_id)->first();
            session(['user_id' => $user->id]);
    	    if($user->is_admin()==1){
    	    	return redirect()->route('admin_dashboard');
    	    }elseif($user->is_admin()==4){
                return redirect()->route('federationdash');
            }
            else{
    	    	return  redirect()->route('home');
    	    }
    	}
    	return redirect()->back();
    }
}
