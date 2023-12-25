<?php

namespace Database\Seeders;

use App\Models\subcategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $subcategories = [
            ['category_id' => 1, 'name' => 'Laptops'],
            ['category_id' => 1, 'name' => 'Smartphones'],
            ['category_id' => 1, 'name' => 'Tablets'],
            ['category_id' => 1, 'name' => 'Audio Devices'],
            ['category_id' => 1, 'name' => 'Smartwatch'],
            ['category_id' => 2, 'name' => 'Men\'s Clothing'],
            ['category_id' => 2, 'name' => 'Women\'s Clothing'],
            ['category_id' => 2, 'name' => 'Footwear'],
            ['category_id' => 3, 'name' => 'Fiction'],
            ['category_id' => 3, 'name' => 'Non-Fiction'],
            ['category_id' => 4, 'name' => 'Living Room Furniture'],
            ['category_id' => 4, 'name' => 'Bedroom Furniture'],
            ['category_id' => 4, 'name' => 'Kitchen and Dining Furniture'],
            ['category_id' => 5, 'name' => 'Outdoor Recreation'],
            ['category_id' => 5, 'name' => 'Fitness Equipment'],
            ['category_id' => 6, 'name' => 'Skincare'],
            ['category_id' => 6, 'name' => 'Haircare'],
            ['category_id' => 7, 'name' => 'Toys for Toddlers'],
            ['category_id' => 7, 'name' => 'Educational Toys'],
            ['category_id' => 8, 'name' => 'Vitamins and Supplements'],
            ['category_id' => 8, 'name' => 'Personal Care'],
            ['category_id' => 9, 'name' => 'Car Accessories'],
            ['category_id' => 9, 'name' => 'Motorcycle Accessories'],
            ['category_id' => 10, 'name' => 'Necklaces'],
            ['category_id' => 10, 'name' => 'Watches'],
            ['category_id' => 11, 'name' => 'Cookware'],
            ['category_id' => 11, 'name' => 'Dinnerware'],
            // Add more subcategories as needed
        ];
        // Insert data into the subcategories table
        subcategories::insert($subcategories);
    }
}
