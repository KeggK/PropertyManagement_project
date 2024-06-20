<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class AllPropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('all-properties', ['properties' => $properties]);
    }

    public function forRentView(){
        $properties = Property::orderBy('title')->where('tag','=','for_rent')->paginate(10);
        return view('for-rent-properties', ['properties' => $properties]);
    }

    public function forSaleView(){
        $properties = Property::orderBy('title')->where('tag','=','for_sale')->paginate(10);
        // dd('tywe',$properties);

        return view('for-sale-properties', ['properties' => $properties]);
    }

    public function destroy($id)
    {
        $properties = Property::find($id);
        $properties->delete();

        return view('all-properties')->with('message', 'Your property was deleted!');
    }
}
