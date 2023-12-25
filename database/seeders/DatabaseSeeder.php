<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
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
        $this->call(user::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubcategoriesSeeder::class);

        //  \App\Models\User::factory()->create([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'role' => 'user',
        //     'password' => Hash::make('user user'),
        // ],
        // [
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'role' => 'admin',
        //     'password' => Hash::make('admin admin'),
        // ],
        // [
        //     'name' => 'seller',
        //     'email' => 'seller@gmail.com',
        //     'role' => 'seller',
        //     'password' => Hash::make('seller seller'),
        // ]);
    }
}
