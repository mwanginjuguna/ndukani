<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'description' => "string"])] public function definition(): array
    {
        $types =['Computing', 'Fashion', 'Bakery', 'Phones', 'Accessories', 'Health and Beauty', 'Kids', 'Gaming', 'African', 'Sportswear', 'Others'];
        return [
            'name' => $this->faker->randomElement($types),
            'description' => $this->faker->sentences(3),
        ];
    }
}
