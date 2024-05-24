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
    }
}
