<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function tampillogin(){
        return view("auth.login");
    }

    public function tampilregister(){
        return view("auth.register");
    }

    public function prosesregister(Request $request){
        $this->validate($request,[
            "name"=> "required",
            "email"=> "required|String|unique:users",
            "password"=> "required|string|min:6"
        ]);
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return redirect("/login")->with("success");
    }

    public function proseslogin(Request $request){
        $this->validate($request,[
            "email"=> "required",
            "password"=> "required|string|min:6"
        ]);
        Auth::attempt([
            "email"=> $request->email,
            "password"=> $request->password
        ]);
        if(Auth::attempt(["email"=> $request->email,"password"=> $request->password])){
            return redirect("/login")->with("success");
        }
        else{
            return redirect("/login")->with('Error','Maaf Email atau Password Salah!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','');
    }
}
