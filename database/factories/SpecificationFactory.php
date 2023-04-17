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
            'product_id' => 8,// rand(1, 10),
            'details' => 'Compared to those dazzling complications watches, simple black and white dial watches are more suitable for showing your elegance.',// $this->faker->sentence(),
            'title' => 'Simple black and white plate',// $this->faker->paragraph(),
            'type' => 'Most of the choice',// $this->faker->randomElement($types),
        ];
    }
}
