<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Feature;
use App\Models\KeyFeature;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Specification;
use App\Models\Tag;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Tag::factory()->count(10)->create();
        // Category::factory()->count(10)->create();
        // Brand::factory()->count(10)->create();
        // Product::factory(1)->create();
        ProductImage::factory(1)->create();
        // Feature::factory(1)->create();
        // KeyFeature::factory(1)->create();
        // Specification::factory(1)->create();
        // Cart::factory(1)->create();
        // Wishlist::factory(1)->create();
        // Review::factory(4)->create();
        // Discount::factory(1)->create();
        // Order::factory(1)->create();
        // OrderItem::factory(1)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
