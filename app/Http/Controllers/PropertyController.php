<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller{


    public function show($id){
        dd($id);
        $property = Property::find($id);
        // dd($property);
        return view('singleProperty',[
            'property'=>$property
        ]);

    }

    public function index(){
        $property = Property::all();
        return view('create-new-property', ['property'=>$property]);
}

public function store(Request $request)
{
    //try {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'no_rooms' => 'nullable',
            'no_toilets' => 'nullable',
            'dimensions' => 'required',
            'tag' => 'required',
        ]);

        // dump($request->image);
        // if($request->hasfile(image)){

        // }

        Property::create([
            'title' => $request->title,
            'photo' => $request->image,
            'description' => $request->description,
            'no_rooms' => $request->no_rooms,
            'no_toilets' => $request->no_toilets,
            'dimensions' => $request->dimensions,
            'tag' => $request->tag,
        ]);

        return redirect()->route('property-create')->with('success', 'Property inserted');


   // }

    // catch(\Exception $e){
    //     return redirect()->route('insertion-page')->with('error', 'Error happened');
    // }
}


}
