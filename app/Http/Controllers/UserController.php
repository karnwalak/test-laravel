<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function login()
    {
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm_password'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return redirect('/')->with('message','User registered successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        // if(Hash::check($request->password,$user->password)){
            return redirect('student');
        }else{
            return redirect()->back()->with('error','Invalid User Name or Password!');
        }
    }

    public function logout()
    {
        if(Auth::user()){
            Auth::logout();
            return redirect('/')->with('message','Logged Out Successfully!');
        }else{
            return redirect('/')->with('error','Not a valid user!');
        }
    }
}