<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'name' => Str::random(10),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomFloat(2, 100, 999),
            'status' => 1,
            'img' => $this->faker->imageUrl(640, 480, 'cats'),
        ];
    }
}
