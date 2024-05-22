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

    public function destroy($id)
    {
        $properties = Property::find($id);
        $properties->delete();

        return view('all-properties')->with('message', 'Your property was deleted!');
    }
}
