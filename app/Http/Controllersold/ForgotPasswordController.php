<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
      return view('auth.forgot-password');
    }
    public function postForgotPassword(Request $request)
    {
      $user=User::whereEmail($request->email)->first();
      if(count($user)==0)
      {
        return redirect()->back()->with(['success'=>'Could not find user']);
      }
      //to set reset code
      $reminder=Reminder::exists($user)?:Reminder::create($user);
      $this->sendEmail($user,$reminder->code);
      return redirect()->back()->with(['success'=>'Reset code has been send to your email']);
    }
    private function sendEmail($user,$code){
      Mail::send('emails.forgot-password',['user'=>$user,
        'code'=>$code],function($message)use($user){
          $message->to($user->email); 
          $message->subject("Hello $user->emp_id,reset your password");       
        });
    }
}
