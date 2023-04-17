<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => 8 /* function () {
                return Product::factory()->create()->id;
            }*/,
            'user_id' => rand(2, 4) /* function () {
                return User::factory()->create()->id;
            }*/,
            'rating' => $this->faker->numberBetween(4, 5),
            'comment' => $this->faker->sentences(nb: 2, asText: true),
        ];
    }
}
