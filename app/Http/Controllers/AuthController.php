<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller{

    public function index(){
        return view('login');
    }


    public function login(Request $request){
        $validator = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            $request->session()->put('logged_in', true);
            return redirect()->intended('/')
            ->withSuccess('Signed in');
        }
        $validator['email_password'] = 'Incorrect email address or password';
        return redirect()->route('login-page')->withErrors(($validator));

    }

    public function registrationIndex(){
        return view('register');
    
    }

    public function registration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            
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
            'password'=>Hash::make($userData['password']),
            'birthday'=>$userData['birthday'],
            'sex'=>$userData['sex'],
            'photo'=>$userData['image']

        ]);
    }

    public function viewProfile(){
        $userData = User::findOrFail(auth()->user()->id);
        return view('myProfile', ['userData'=>$userData]);
    }


    public function home(){
        if(Auth::check()){
            return view('home_page');
        }

        return redirect()->route('login-page')->withSuccess('You were unable to access');
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login-page');
    }

}


