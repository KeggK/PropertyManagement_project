<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{


    public function show($id)
    {

        $property = Property::findOrFail($id);
        return view('singleProperty', [
            'property' => $property
        ]);
    }

    public function index()
    {
        $property = Property::all();
        return view('create-new-property', ['property' => $property]);
    }

    public function store(Request $request)
    {

        $imgName = "";
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


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . rand() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/hazaar-images', $filename);
            $imgName = $filename;
        }

        // dd($imgName);



        Property::create([
            'title' => $request->title,
            'photo' => $imgName,
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

    public function edit($id)
    {
        $property = Property::find($id);
        return view('edit-property', ['property' => $property]);
    }

    public function update(Request $request, $id)
    {
        dump($request);
        $property = Property::find($id);
    }

    public function destroy($id)
    {
        $property = Property::find($id);

        $property->delete();
        return redirect()->route('all-properties-page')->with('success', 'Property deleted!');
    }
}
