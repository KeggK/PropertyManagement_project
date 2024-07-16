<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\AboutContact;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view()
    {
        $total_users = User::count();
        $total_properties = Property::count();
        $total_contacts = AboutContact::count();
        return view('dashboard', ['total_users' => $total_users, 'total_properties' => $total_properties, 'total_contacts' => $total_contacts]);
    }

    public function displayUsers()
    {
        $users = User::orderBy('name')->paginate(2);
        return view('users-table', ['users' => $users]);
    }

    public function displayProperties()
    {
        if(Auth::user()->isAdmin()) {
            $properties = Property::orderBy('title')->paginate(20);
        } else {
            $properties = Property::where('user_id', auth()->user()->id)->orderBy('title')->paginate(20);
        }
        return view('properties-table', ['properties' => $properties]);
    }

    public function displayQuestions()
    {
        $questions = AboutContact::orderBy('name')->paginate(20);
        return view('questions-table', ['questions' => $questions]);
    }
}
