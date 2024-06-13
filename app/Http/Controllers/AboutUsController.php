<?php

namespace App\Http\Controllers;
use App\Models\AboutContact;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function index(){
        return view("about");
    }

    public function contactUs(Request $request ){

        $request->validate([
            'name' => 'required',
            'subject'=> 'required',
            'message'=> 'required',
            'email'=> 'required'
        ]);

        $contactData=[
            'name' => $request['name'],
            'subject'=> $request['subject'],
            'message'=> $request['message'],
            'email'=> $request['email']
        ];

        AboutContact::create($contactData);

        return redirect()->route('about-contact')->withSuccess('Email was sent successfully!');

    }

}
