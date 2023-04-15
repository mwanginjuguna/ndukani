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
        $types = ['text', 'number', 'select'];

        return [
            'product_id' => Product::factory(),
            'title' => $this->faker->sentence(),
            'details' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement($types),
        ];
    }
}
