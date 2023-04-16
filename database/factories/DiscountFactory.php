<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends Factory
 */
class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'NEW2023', // $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'percent_off' => $this->faker->numberBetween(5, 50),
            'expires_at' => Carbon::now()->addDays($this->faker->numberBetween(10, 30)),
        ];
    }
}
