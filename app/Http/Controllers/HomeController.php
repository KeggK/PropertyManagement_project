<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        return view("welcome", [
            "menu_items" => $this->menu,
            'saleProperties' => $saleProperties,
            'rentProperties' => $rentProperties
        ]);
    }



    public function displayForSaleProperties()
    {
        $sale_properties = Property::where('tag', 'LIKE', 'for_sale')->get();
        // dd('kloe',$sale_properties);
        $sale_properties = Property::orderBy('title')->paginate(3);
        return $sale_properties;
    }

    public function displayForRentProperties()
    {
        $rent_properties = Property::where('tag', 'LIKE', 'for_rent')->get();
        // dd('egg', $rent_properties);
        $rent_properties = Property::orderBy('title')->paginate(3);
        return $rent_properties;
    }
}
