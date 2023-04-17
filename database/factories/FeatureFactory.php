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
        $features = ['Model', 'SKU', 'Weight', 'Shop Type'];
        return [
            'product_id' => 8, // rand(1, 10),
            'name' => 'Shop Type',// $this->faker->word,
            'details' => 'Men Fashion',// $this->faker->sentence,
        ];
    }
}
