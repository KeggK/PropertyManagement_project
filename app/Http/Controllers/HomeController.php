<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $menu = [
        
            
        "Kreu" => "home_page",
        "Ne Shitje" => "home_page",
        "Me Qira" => "home_page",
        "Cmimet" => "home_page",
        "Kontakt" => "home_page",
        "About" => "about-us-page",
        
    ];
    public function displayHome(){
        return view("welcome",["menu_items"=>$this->menu]);
    }
}
