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
        $monies = [
            'Kenya' => 'KES',
            'Uganda' => 'UGX',
            'Tanzania' => 'TZS',
            'South Africa' => 'ZAR',
            'Nigeria' => 'NGN',
            'Ethiopia' => 'ETB',
            'UK' => 'GBP',
            'USA' => 'USD',
            'Russia' => 'RUB',
            'China' => 'CNY',
            'UAE' => 'AED',
            'Saudi Arabia' => 'SAR'
        ];

        $productName = "Wlisth - Brand Men's Quartz Stainless Steel Casual Watch";

        return [
            'name' => $productName.' '.$this->faker->unique()->words(2, true),
            'category_id' => 3 ?? rand(1, 14), // Assuming you have 14 categories in your database
            'tag_id' => 8 ?? rand(1, 8), // Assuming you have 8 tags in your database
            'brand_id' => 6 ?? rand(1, 6), // Assuming you have 6 brands in your database
            'seller_id' => 1, // Assuming you have 1 sellers in your database
            'price' => $this->faker->randomFloat(2, 4300, 5500),
            'currency' => 'USD', //$this->faker->randomElement(array: $monies),
            'description' => $this->faker->paragraph(3),
            'quantity' => rand(20, 50),
            'in_stock' => $this->faker->boolean(chanceOfGettingTrue: 100),
        ];
    }
}
