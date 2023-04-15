<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => $this->faker->randomNumber(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->randomFloat(2, 100, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'tax' => $this->faker->randomFloat(2, 0, 100),
            'shipping' => $this->faker->randomFloat(2, 0, 50),
            'total' => $this->faker->randomFloat(2, 100, 1000),
            'payment_gateway' => $this->faker->randomElement(['stripe', 'paypal']),
            'payment_id' => $this->faker->uuid,
            'notes' => $this->faker->text,
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered']),

        ];
    }
}
