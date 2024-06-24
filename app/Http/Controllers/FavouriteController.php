<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FavouriteController extends Controller
{
    public function displayFaves(){
        $favourite = Favourite::where('user_id',auth()->user()->id)->get();
        return view('favourites', ['favourite'=>$favourite]);
    }

    public function destroy($property_id){
        $favourite = Favourite::where('user_id', auth()->user()->id)->where('property_id', $property_id)->first();
        $favourite->delete();
        return redirect()->route('favourite-list-page')->with('message', 'The property was removed from favourites!');
    }
}