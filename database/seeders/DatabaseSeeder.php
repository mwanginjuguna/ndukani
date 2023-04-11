<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $products = [];
        foreach ($products as $product) {
            \App\Models\Product::factory()->create([
                'name' => $product->name,
                'category_id' => $product->category_id,
                'tag_id' => $product->tag_id,
                'brand_id' => $product->brand_id,
                'seller_id' => $product->seller_id,
                'price' => $product->price,
                'currency' => $product->currency,
                'description' => $product->description,
                'quantity' => $product->quantity,
                'in_stock' => $product->in_stock,
            ]);
    }

    }
}
