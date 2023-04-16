<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'description' => "string", 'category_id' => "mixed"])] public function definition(): array
    {
        $brands = ['Samsung', 'Afrik', 'Apple', 'Sony', 'Wakanda', 'Tesla'];
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'category_id' => rand(1, 13),
        ];
    }
}
