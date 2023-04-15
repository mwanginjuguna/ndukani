<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true),
            'category_id' => rand(1, 5), // Assuming you have 10 categories in your database
            'tag_id' => rand(1, 5), // Assuming you have 20 tags in your database
            'brand_id' => rand(1, 5), // Assuming you have 5 brands in your database
            'seller_id' => rand(1, 5), // Assuming you have 10 sellers in your database
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'currency' => 'USD',
            'description' => $this->faker->paragraph(3),
            'quantity' => rand(20, 100),
            'in_stock' => $this->faker->boolean(chanceOfGettingTrue: 80),
        ];
    }
}
