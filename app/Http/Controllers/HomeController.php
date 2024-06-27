<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Favourite;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public $menu = [


        "Kreu" => "home_page",
        "Ne Shitje" => "for-sale-properties-page",
        "Me Qira" => "for-rent-properties-page",
        "Cmimet" => "home_page",
        "Kontakt" => "home_page",
        "About" => "about-us-page",
        "Blog" => "blog-page",
        "Insert Property" => "new-property-page",
        // "Property" => "single-property-page"

    ];


    public function displayHome()
    {

        $saleProperties = $this->displayForSaleProperties();
        $rentProperties = $this->displayForRentProperties();
        // dd($saleProperties,$rentProperties);
        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();
        // dd($posts);
        return view("welcome", [
            "menu_items" => $this->menu,
            'saleProperties' => $saleProperties,
            'rentProperties' => $rentProperties,
            'posts' => $posts
        ]);
    }

    public function makeFavourite($property_id)
    {
// dd(url()->current());

        $is_found = Favourite::where('user_id', auth()->user()->id)->where('property_id', $property_id)->exists();
        if ($is_found) {
            $favourite_item = Favourite::where('user_id', auth()->user()->id)->where('property_id', $property_id)->first();

            $favourite_item->delete();
            return redirect()->route('home_page')->withSuccess('The propety was unfavourited');
        } else {
            Favourite::create([
                'user_id' => auth()->user()->id,
                'property_id' => $property_id
            ]);
            return back()->with('success', 'Property was added to Favourites');

        }


        // dd($is_found);


        // $property = Favourite::auth()->user()->favourite()->attach($property_id);


        // return route session flash successs
        // add try cATCH BLOCK

    }



    public function displayForSaleProperties()
    {
        $sale_properties = Property::where('tag', 'for_sale')->paginate(3);
        // dd('kloe',$sale_properties);
        // $sale_properties = Property::orderBy('title')->paginate(3);
        return $sale_properties;
    }

    public function displayForRentProperties()
    {
        $rent_properties = Property::where('tag', 'for_rent')->paginate(3);
        // dd('egg', $rent_properties);
        // $rent_properties = Property::orderBy('title')->paginate(3);
        return $rent_properties;
    }
}
