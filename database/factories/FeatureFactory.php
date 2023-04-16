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
        $features = ['Model', 'SKU', 'Weight'];
        return [
            'product_id' => 4, // rand(1, 10),
            'name' => 'Weight (kg)',// $this->faker->word,
            'details' => '0.195',// $this->faker->sentence,
        ];
    }
}
