<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Redirect;
use Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{


    public function index(){
        return view("register");
    }


    public function login(){
        return view("login");
    }

    public function store(Request $req){
        $rule=array(
            'Email'                 => 'required|Email',
            'Password'              => 'required',
            'RepeatPassword'        => 'required|same:Password',
            'FirstName'             => 'required',
            'LastName'              => 'required',
            'Phone'                 => 'required',
            'MobilePhone'           => 'required',
            'OS'                    => 'required',
        );

        $message=array(
            'Email.required'        => 'Email is required',
            'FirstName.required'    => 'FirstName is required',
            'LastName.required'     => 'LastName is required',
            'Phone.required'        => 'Phone is required',
            'MobilePhone.required'  => 'MobilePhone is required',
            'OS.required'           => 'OS is required',
        );

        $validator = Validator::make($req->all(), $rule, $message);
        if ( $validator -> fails() ){
            return Redirect::to('/register')->withErrors($validator)->withInput();
        }else{
            $user = new User();

            $user->email       = $userEmail = $req -> input('Email');
            $user->FirstName   = $req -> input('FirstName');
            $user->LastName    = $req -> input('LastName');
            $user->Phone       = $req -> input('Phone');
            $user->MobilePhone = $req -> input('MobilePhone');
            $user->OS          = $req -> input('OS');
            $user->password    = Hash::make($req -> input('Password'));
            $user->type        = "";
            $user->level       = "1";
            if ($req -> input('registerType') == 'Client'){
                $user->Admin = 0;
            }else if($req -> input('registerType') == 'Admin'){
                $user->Admin = 1;
            }

            $user_password = User::whereEmail($userEmail)->select('Password')->get();
            $userSize = sizeof($user_password);

            if ($userSize == 0){// if record is not exist
                $user->save();//User::create($req->all());
                echo "saved";
                return Redirect::to('/register')->with('ticketSuccess','Successfully');
            }else{
                Session::flash('register','Username has been registered!');
                return Redirect::to('/register');
            }

        }
    }

    public function loginAction(Request $req){
        $rule=array(
            'Email'                 => 'required|Email',
            'login_Password'              => 'required'
        );
        $message=array(
            'Email.required'        => 'Email is required',
            'login_Password.required'     => 'Password is required'
        );
        $validator = Validator::make($req->all(), $rule, $message);
        if ( $validator -> fails() ){
            //return Redirect::to('/login')->withErrors($validator)->withInput();
        }else {
            $input     = $req->all();
            $email     = $input['Email'];
            $password  = $input['login_Password'];


            $userdata=array(
                'email'=>$email,
                'password'=>$password
            );


            if(Auth::attempt($userdata)){
                echo "yes match";

                if (Auth::check()) {
                    echo "Authenticated!";
                } else {
                    echo "Not Authenticated";
                }

                $user = Auth::user();
                //Auth::login($user);
                echo $user;
                session()->put("email",$user['email']);
                session()->put("admin",$user['Admin']);
                session()->put("firstName",$user['FirstName']);
                session()->put("lastName",$user['LastName']);
                session()->put("phone",$user['Phone']);
                session()->put("mobilePhone",$user['MobilePhone']);
                session()->put("os",$user['OS']);
                return Redirect::to('/form');
            }else{
                return Redirect::to('/login')->with('ticketSuccess','password invalid');
            }
        }
    }

    public function logout(){
        session()->forget('email');
        session()->forget('admin');
        session()->forget('firstName');
        session()->forget('lastName');
        session()->forget('phone');
        session()->forget('mobilePhone');
        session()->forget('os');
        return Redirect::to('/');
    }
}
