<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Property;
use App\Models\Category;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('yourpassword')
        ]);

        User::create([
            'name' => 'Test User2',
            'email' => 'test@example2.com',
            'password' => Hash::make('yourpassword')
        ]);

        User::create([
            'name' => 'Test User3',
            'email' => 'test@example3.com',
            'password' => Hash::make('yourpassword')
        ]);

        Category::create([
            'category_name' => 'art',
        ]);

        Category::create([
            'category_name' => 'sport'
        ]);

        City::create([
            'name' => "Tirane"
        ]);

        City::create([
            'name' => "Elbasan"
        ]);

        City::create([
            'name' => "Durres"
        ]);

        City::create([
            'name' => "Vlore"
        ]);

        City::create([
            'name' => "Fier"
        ]);

        Property::create([
            'title' => "Apartament ne shitje",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 2,
            'city_id'=> 1

        ]);
        Property::create([
            'title' => "Okazion: Apartament ne shitje",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 1,
            'city_id'=> 2
        ]);
        Property::create([
            'title' => "Premium Sale!",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 1,
            'city_id'=> 5
        ]);


        Property::create([
            'title' => "Apartament me qira",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1,
            'city_id'=> 4
        ]);
        Property::create([
            'title' => "Vile private ne bregdet",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1,
            'city_id'=> 3
        ]);
        Property::create([
            'title' => "Okazion: Gazionere",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1,
            'city_id'=> 1
        ]);

    }
}

