<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Feature;
use App\Models\KeyFeature;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Seller;
use App\Models\Specification;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    // all products
    public function index(Request $request)
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $sellers = Seller::all();
        $users = User::all();
        return response()->json([
            "products" => $products,
            "brands" => $brands,
            "categories" => $categories,
            "tags" => $tags,
            "sellers" => $sellers,
            "users" => $users
            ]);
    }

    /*
     * Create a new product
     * @param App\Http\Requests\ProductRequest
     * return JSON data
     */
    public function create(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $discounts = Discount::all();

        return Inertia::render('Products/ProductCreate', [
            "brands" => $brands,
            "categories" => $categories,
            "tags" => $tags,
            "discounts" => $discounts
        ]);
    }

    /*
     * Store a new product
     * @param App\Http\Requests\ProductRequest
     * return JSON data
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        // save product to db
        $product = Product::create($validatedData);

        // API response
        return response()->json([
            'message' => 'Product saved successfully',
            'product' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::query()
            ->where('id', '=', $product->category_id)
            ->first();
        $tag = Tag::query()
            ->where('id', '=', $product->tag_id)
            ->first();
        $brand = Brand::query()
            ->where('id', '=', $product->brand_id)
            ->first();
        $seller = Seller::query()
            ->where('id', '=', $product->seller_id)
            ->first();
        $ratings = Rating::query()
            ->where('id', '=', $product->rating_id)
            ->get();
        $specifications  = Specification::query()
            ->where('product_id', '=', $product->id)
            ->get();
        $features  = Feature::query()
            ->where('product_id', '=', $product->id)
            ->get();
        $keyFeatures  = KeyFeature::query()
            ->where('product_id', '=', $product->id)
            ->get();

        return response()->json([
            "product" => $product,
            "category" => $category,
            "tag" => $tag,
            "brand" => $brand,
            "seller" => $seller,
            "ratings" => $ratings,
            "specifications" => $specifications,
            "features" => $features,
            'keyFeatures' => $keyFeatures
        ]);
    }
}
