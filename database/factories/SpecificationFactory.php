<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class SpecificationFactory extends Factory
{
    protected $model = Specification::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Original', 'New', 'Official'];

        return [
            'product_id' => 4,// rand(1, 10),
            'title' => 'Protection',// $this->faker->sentence(),
            'details' => 'Corning Gorilla Glass 5',// $this->faker->paragraph(),
            'type' => 'Display',// $this->faker->randomElement($types),
        ];
    }
}
