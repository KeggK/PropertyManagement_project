<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\FormContact;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyContactEmail;
use Exception;

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
        //dump($request);
        $imgName = "";

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


        $property = Property::find($id);
        $property->update([
            'title' => $request->title,
            'photo' => $imgName,
            'description' => $request->description,
            'no_rooms' => $request->no_rooms,
            'no_toilets' => $request->no_toilets,
            'dimensions' => $request->dimensions,
            'tag' => $request->tag,
        ]);

        return redirect()->route('property-create')->with('success', 'Property updated');
    }

    public function destroy($id)
    {
        $property = Property::find($id);

        $property->delete();
        return redirect()->route('all-properties-page')->with('success', 'Property deleted!');
    }


    public function sendEmail(Request $request, $propertyId)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        try {
            $formData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message ?? '',
                'property_id' => (int) $propertyId,
                'role' => $request->role ?? 'seller',
            ];
            Mail::to('admin@gmail.com')->send(new PropertyContactEmail($formData));
            FormContact::create($formData);
            return redirect()->route('property-contact', ['id' => $propertyId])->withSuccess('Thanks for contacting us!');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
