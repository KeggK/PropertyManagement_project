<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\FormContact;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyContactEmail;
use App\Models\Favourite;
use App\Models\Reservation;
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
            'price' => 'nullable',
            'city_id' => 'nullable'
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
            'price' => $request->price,
            'user_id' => auth()->user()->id,
            'city_id' => $request->city_id
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
            'price' => 'nullable',
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
            'price' => $request->price,
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
            // $contacted = FormContact::where('property_id', $propertyId)->withCount('formData');
            return redirect()->route('property-contact', ['id' => $propertyId])->withSuccess('Thanks for contacting us!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function showPropertyContactForms($property_id)
    {
        $forms = FormContact::where('property_id', $property_id)->get();
        return view('property-contact-forms', ['forms' => $forms]);
    }

    public function bookMeeting(Request $request, $property_id)
    {

        $request->validate([
            'tour_type' => 'required',
            'date' => 'required',
            'time' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);

        //dd($request);



        try {
            $reservationData = [
                'tour_type' => $request->tour_type,
                'date' => $request->date,
                'time' => $request->time,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message ?? '',
                'property_id' => (int) $property_id
            ];

            Reservation::create($reservationData);
            return redirect()->route('single-property', ['id' => $property_id])->withSuccess('The meeting was successfully booked!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function displayReservations()
    {

        if (auth()->user()->role == 'admin') {
            $reservations = Reservation::all();
        } else {
            $reservations = Reservation::whereHas('property.user', function ($query) {
                $query->where('id', auth()->user()->id); // Adjust 'id' to the actual column name of the User ID in your database
            })->get();
        }

        //dd($reservations);
        return view('reservations-table', ['reservations' => $reservations]);
    }

    public function mostLiked()
    {
        $mostLiked = Favourite::orderBy('id')->paginate(3);
        return view('singleProperty', ['$mostLiked' => $mostLiked]);
    }

    public function filterProperties(Request $request){
        // dd($request, $request->maxPrice);
        if($request->city_id){
            $city_id = (int)$request->city_id;
            $properties = Property::where('city_id', $city_id)->get();
        }

        if($request->maxPrice){
           // $city_id = (int)$request->city_id;
            $properties = Property::where('price', $request->maxPrice)->get();
        }

        return view('filtered-properties', ['properties'=>$properties]);
    }

}
