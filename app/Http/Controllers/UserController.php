<?php 

namespace App\Http\Controllers;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class UserController extends Controller{


    public function index(){
        $user=User::all();
        return view('myProfile',['user'=>$user]);
    }

    // public function store(Request $request){
        
    //     $request->validate([
    //         'birthday'=>'required',
    //         'sex'=>'required',
    //         'email'=>'required',
    //         'password'=>'required'
    //     ]);
    // }

    
}