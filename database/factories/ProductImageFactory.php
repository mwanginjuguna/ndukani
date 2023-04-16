<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Samsung Galaxy A13
        $urls = [
            'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/86/782736/2.jpg?3156',
            'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/86/782736/3.jpg?3156',
            'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/86/782736/5.jpg?3156',
            'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/86/782736/7.jpg?3156'
        ];
        return [
            'product_id' => 6, // rand(1, 10),
            'path' => 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/91/219846/8.jpg?5074', // $urls[0],// $this->faker->imageUrl(),
            'title' => "Wlisth - Brand Men's Quartz Stainless Steel Casual Watch",// $this->faker->sentence(nbWords: 5),
            'alt' => "Wlisth - Brand Men's Quartz Stainless Steel Casual Watch",// $this->faker->sentence(),
            'is_main' => 0,// $this->faker->boolean(chanceOfGettingTrue: 100),
            'order' => 8,// $this->faker->numberBetween(0, 10),
        ];
    }

    /**
     * Configure the factory instance.
     *
     * @return $this
     */
    public function configure(): static
    {
        return $this->afterMaking(function (ProductImage $productImage) {
            // After creating the ProductImage instance, retrieve the image file contents
            $imageData = file_get_contents($productImage->path);

            // Extract the filename from the path
            $filename = basename($productImage->path);

            // Save the image data to the public disk using the filename
            Storage::disk('public')->put($filename, $imageData);
        });
    }
}
