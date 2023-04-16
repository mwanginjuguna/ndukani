<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = ['African', 'Fashion', 'Man Clothes', 'Woman Clothes', 'Phone', 'Smartphone', 'Computers',
            'Tablets', 'Feature PHones', 'Accessories', 'Others'];
        return [
            'name' => $this->faker->randomElement($tags),
            'category_id' => rand(2, 14),
        ];
    }
}
