<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'name' => $this->faker->word,
            'details' => $this->faker->sentence,
        ];
    }
}
