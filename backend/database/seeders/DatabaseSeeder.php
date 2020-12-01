<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'Apple']);
        Brand::create(['name' => 'Samsung']);

        Category::create(['name' => 'Phone']);
        Category::create(['name' => 'Tab']);

        Product::create([
            'brand_id' => 1,
            'category_id' => 1,
            'name' => 'Apple iPhone 12',
            'description' => 'This is a very long description.',
            'price' => 3800.00,
            'status' => 1,
            'img' => 'https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-12.jpg',
        ]);

        Product::create([
            'brand_id' => 1,
            'category_id' => 2,
            'name' => 'Apple iPad Air',
            'description' => 'This is a very long description.',
            'price' => 3600.00,
            'status' => 1,
            'img' => 'https://fdn2.gsmarena.com/vv/bigpic/apple-ipad-air4-2020.jpg',
        ]);

        Product::create([
            'brand_id' => 2,
            'category_id' => 1,
            'name' => 'Samsung Galaxy Note20',
            'description' => 'This is a very long description.',
            'price' => 3000.00,
            'status' => 1,
            'img' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-note20-5g-r.jpg',
        ]);

        Product::create([
            'brand_id' => 2,
            'category_id' => 2,
            'name' => 'Samsung Galaxy Tab S6',
            'description' => 'This is a very long description.',
            'price' => 3300.00,
            'status' => 1,
            'img' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-tab-s6.jpg',
        ]);

        User::factory(2)->create();
    }
}
