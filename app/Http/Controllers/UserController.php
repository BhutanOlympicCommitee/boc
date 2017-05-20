<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getEmployee(Request $request)
    {
      $id=$request->name;  
      Session::put('employeeID',$id);
      return view('admin.user.add_user');
    }

    public function index(){
    	$users = User::all();
    	return view('admin.user.view',['users'=>$users]);
    }
    public function postUser(Request $request){
    	$user = new User;
    	$user->emp_id = Input::get('employ_id');
    	$user->email = Input::get('email');
    	$user->role_id = Input::get('user_role');
      $user->sport_organization=Input::get('federation_type');
    	$password = Input::get('password');
    	$user->password = Hash::make($password);
    	$user->save();
    	return redirect()->route('view_user');
    }
    public function updateUser(Request $request){
    	$id = Input::get('user_id');
    	$name = Input::get('name');
    	$email = Input::get('email');
    	$role_id = Input::get('user_role1');
    	$user = new User;
    	$user::where('id',$id)
    		->update([
    			'name' => $name,
    			'email'=> $email,
    			'role_id' =>$role_id
    			]);
    	return redirect()->route('view_user');
    }
    public function deleteUser($id){
    	$user = new User;
    	$user::where('id', $id)->delete();
    	return redirect()->route('view_user');
    }
}
