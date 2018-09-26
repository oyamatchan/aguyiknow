<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Picture;
use App\Notification;
use DB;
use Validator;
class LoginController extends Controller
{

//return what uis the value to be processed during authentication
    public function username(){
        return 'email';
    }
    
//attempt is a method that checks if the authentication is successful-returns true or false value
    public function authenticate(Request $request){
        $authResult = Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]);
        $email=$request->email;
        $password=$request->password;
        // check if the email exists or registered
        $checkEmail = DB::table('users')->where('email',$email)->first();
        // check if the email and password match
        $checkAccount = DB::table('users')->where([['email',$email],['password',$password]])->first();

        if($authResult){

            $id=Auth::id();
            $profile = User::where('id',$id)->get();     
            $picture = Picture::where('user_fk',$id)->first();

            return view('home',['profile'=>$profile],['picture'=>$picture]);
        }

       
        else {   
            if($checkEmail!=null && $checkAccount==null) {   
            return redirect()->to(route('login'))
            ->with('passwordstatus',
            'Email and password does not match');
            }
            else if($checkEmail==null){
            return redirect()->to(route('login'))
            ->with('emailstatus',
            'Email is not yet registered');
            }
        }
    
}

    public function logout(){
        Auth::logout();
        return redirect()->to(route('login'));
    }
}
