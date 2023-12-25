<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Books'],
            ['name' => 'Home and Furniture'],
            ['name' => 'Sports and Outdoors'],
            ['name' => 'Beauty and Personal Care'],
            ['name' => 'Toys and Games'],
            ['name' => 'Health and Wellness'],
            ['name' => 'Automotive'],
            ['name' => 'Jewelry and Accessories'],
            ['name' => 'Kitchen and Dining'],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
