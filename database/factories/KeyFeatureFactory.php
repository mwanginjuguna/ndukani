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
            'product_id' => 4, // rand(1, 10),
            'name' => 'Memory',// $this->faker->randomElement($kfs),
            'details' => '64GB Internal + 4GB RAM',// $this->faker->sentence,
        ];
    }
}
