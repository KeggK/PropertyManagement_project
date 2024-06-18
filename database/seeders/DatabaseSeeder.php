<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('yourpassword')
        ]);

        \App\Models\User::create([
            'name' => 'Test User2',
            'email' => 'test@example2.com',
            'password' => Hash::make('yourpassword')
        ]);

        \App\Models\User::create([
            'name' => 'Test User3',
            'email' => 'test@example3.com',
            'password' => Hash::make('yourpassword')
        ]);

        \App\Models\Category::create([
            'category_name' => 'art',
        ]);

        \App\Models\Category::create([
            'category_name' => 'sport'
        ]);

        \App\Models\Property::create([
            'title' => "Apartament ne shitje",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 1

        ]);
        \App\Models\Property::create([
            'title' => "Okazion: Apartament ne shitje",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 1
        ]);
        \App\Models\Property::create([
            'title' => "Premium Sale!",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Sale",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_sale',
            'price' => 2568,
            'user_id'=> 1
        ]);


        \App\Models\Property::create([
            'title' => "Apartament me qira",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1
        ]);
        \App\Models\Property::create([
            'title' => "Vile private ne bregdet",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1
        ]);
        \App\Models\Property::create([
            'title' => "Okazion: Gazionere",
            'photo' => '1717586844358732153.jpg',
            'description' => "Description for Property for Rent",
            'no_rooms' => rand(1, 5),
            'no_toilets' => rand(1, 3),
            'dimensions' => '100x100',
            'tag' => 'for_rent',
            'price' => 2568,
            'user_id'=> 1
        ]);

    }
}
