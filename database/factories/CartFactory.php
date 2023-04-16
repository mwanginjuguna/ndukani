<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CartFactory extends Factory
{
    protected $model = Cart::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::factory()->create();
        $user = User::factory()->create();

        return [
            'product_id' => 4, // $product->id,
            'user_id' => 1, // $user->id,
            'quantity' => 1, // $this->faker->numberBetween(1, 10),
        ];
    }
}
