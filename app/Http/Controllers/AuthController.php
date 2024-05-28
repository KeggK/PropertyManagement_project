<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function index(){
        return view('login');
    }


    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect()->route('home_page')->withSuccess('Logged in');
        }
        $login['email_password'] = 'Incorrect email address or password';
        return redirect()->route('login-page')->withErrors(($login));

    }

    public function registrationIndex(){
        return view('register');
    
    }

    public function registration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);
        // dd($request);
        $userData = $request->all();
        $check = $this->create($userData);

        return redirect()->route('home_page')->withSuccess('You are signed-in');
    }

    
    public function create($userData){
        return User::create([
            'name'=>$userData['name'],
            'email'=>$userData['email'],
            'password'=>Hash::make($userData['password'])
        ]);
    }

    public function home(){
        if(Auth::check()){
            return view('home_page');
        }

        return redirect()->route('login-page')->withSuccess('You were unable to access');
    }

}


