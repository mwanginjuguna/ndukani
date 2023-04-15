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
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
