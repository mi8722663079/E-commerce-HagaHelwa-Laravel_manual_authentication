<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function register(){
        return view("user.signup");
    }

    public function logForm(){
        return view("user.login");
    }

    public function assert(Request $request){

        $data = $request->validate([
            "username" => "required|min:3|max:100|string",
            "email" => "required|email",
            "password" => "required|confirmed|min:6",
            "phone" => "integer|max:12",
            "address" => "string|min:25"
        ]);
        $data["password"] = bcrypt($request->password);
        $valid = User::select()->where("email","=",$request->email)->first();
        if($valid){
            return redirect()->route("auth.reg")->withErrors("Email already exists");
        }
        User::create($data);
        return redirect()->route("login")->with("success","Registeration Successful, Please Log in!");
    }

    public function log(Request $request){

        $data = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);
        $valid = Auth::attempt($data);
        if(!$valid){
            return redirect()->route("login")->withErrors("Email or password are incorrect.");
        }
        $user = User::select()->where("email","=",$request->email)->first();
        if($user->rank == "admin"){
            Auth::login($user);
            return redirect()->route("admin")->with("success", "Welcome $user->username");
        }else{
            Auth::login($user);
            return redirect()->route("index")->with("success", "Welcome $user->username");
        }
    }

    public function exit(){

        Auth::logout();
        return redirect()->route("index");

    }
}
