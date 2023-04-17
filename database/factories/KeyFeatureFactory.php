<?php

namespace Database\Factories;

use App\Models\KeyFeature;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class KeyFeatureFactory extends Factory
{
    protected $model = KeyFeature::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kfs = ['Size', 'Memory', 'Color', 'Display'];
        return [
            'product_id' => 8, // rand(1, 10),
            'name' => 'Guaranteed brand new.',// $this->faker->randomElement($kfs),
            // $this->faker->sentence,
        ];
    }
}
