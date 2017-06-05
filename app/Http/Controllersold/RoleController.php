<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Role;
class RoleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$roles = Role::all();
    	return view('admin.role.view',['roles'=>$roles]);
    }

    public function postRole(Request $request){
    	$role = new Role;
    	$role->role_name = Input::get('role_name');
    	$role->description = Input::get('description');
    	$role->save();
    	return redirect()->route('view_role');
    }
    public function updateRole(Request $request){
    	$id = Input::get('role_id');
    	$role_name = Input::get('role_name');
    	$description = Input::get('description');
    	$Role = new Role;
    	$Role::where('id',$id)
    		->update([
    			'role_name' => $role_name,
    			'description'=> $description
    			]);
    	return redirect()->route('view_role');
    }
    public function deleteRole($id){
    	$user = new Role;
    	$user::where('id', $id)->delete();
    	return redirect()->route('view_role');
    }
}
