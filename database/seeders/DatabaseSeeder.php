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
        User::factory(10)->create();
        Tag::factory()->count(10)->create();
        Category::factory()->count(10)->create();
        Brand::factory()->count(10)->create();
        Product::factory(20)->create();
        Feature::factory(20)->create();
        KeyFeature::factory(20)->create();
        Specification::factory(20)->create();
        Cart::factory(4)->create();
        Wishlist::factory(6)->create();
        Review::factory(8)->create();
        Discount::factory(8)->create();
        Order::factory(6)->create();
        OrderItem::factory(12)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
