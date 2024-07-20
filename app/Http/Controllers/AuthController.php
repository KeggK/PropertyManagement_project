<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('logged_in', true);
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }
        $validator['email_password'] = 'Incorrect email address or password';
        return redirect()->route('login-page')->withErrors(($validator));
    }

    public function registrationIndex()
    {
        return view('register');
    }

    public function registration(Request $request)
    {
        $imgName = "";

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);
        // dd($request);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . rand() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/hazaar-images', $filename);
            $imgName = $filename;
        }

        $userData = $request->all();
        $check = $this->create($userData);

        return redirect()->route('home_page')->withSuccess('You are signed-in');
    }


    public function create($userData)
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'birthday' => $userData['birthday'],
            'sex' => $userData['sex'],
            'photo' => $userData['image']

        ]);
    }

    public function viewProfile()
    {
        $userData = User::findOrFail(auth()->user()->id);
        return view('myProfile', ['userData' => $userData]);
    }

    public function update(Request $request, $id)
    {
        $imgName = "";
        //dd($request);

try{
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . rand() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/hazaar-images', $filename);
            $imgName = $filename;
        }

    
        $userData = User::find($id);
        $userData->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request['password']),
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'photo' => $imgName

        ]);

        return redirect()->route('my-profile-page')->withSuccess('Profile updated!');

    }

    catch (\Exception $e){
        return redirect()->route('my-profile-page')->withErrors('Profile not updated!'. $e->getMessage());  
    }


    }

    public function changePassword(){
        return view ('myProfile');
    }

    
    public function passwordUpdate(Request $request){

        

        try{
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);


        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->route('my-profile-page')->withErrors( "The password doesn't match!");
        }

        // dd($request);

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('my-profile-page')->with('success','Password was changed!');
    }

        catch(\Exception $e){

            //dd($e);
            return redirect()->route('my-profile-page')->withErrors('Password not updated!'. $e->getMessage()); 
        }

    }


    public function home()
    {
        if (Auth::check()) {
            return view('home_page');
        }

        return redirect()->route('login-page')->withSuccess('You were unable to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login-page');
    }
}
