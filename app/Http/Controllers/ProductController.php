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
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * get all products
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Product::query();

        // filter by brand
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }

        // filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // filter by rating
        if ($request->has('rating')) {
            $query->where('rating', $request->rating);
        }

        // apply sorting if required
        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;

            if ($sortBy === 'price_high_to_low') {
                $query->orderByDesc('price');
            } elseif ($sortBy === 'price_low_to_high') {
                $query->orderBy('price');
            } elseif ($sortBy === 'name_a_to_z') {
                $query->orderBy('name');
            } elseif ($sortBy === 'name_z_to_a') {
                $query->orderByDesc('name');
            } elseif ($sortBy === 'rating') {
                $query->orderByDesc('rating');
            }
        }

        $products = $query->paginate(10);

        return response()->json($products);
    }

    /**
     * Create a new product
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
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

    /**
     * Store a new product
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request): JsonResponse
    {
        // dd($request);
        $validatedData = $request->validated();

        // save product to db
        $product = Product::create($validatedData);

        if (!isset($request->seller_id))
        {
            $product->seller_id = auth()->id();
            $product->save();
        }

        // API response
        return response()->json([
            'message' => 'Product saved successfully',
            'product' => $product
        ]);
    }

    /**
     * Show/view a product resource
     * @param Product $product
     * @return Response
     */
    public function show(Product $product): Response
    {
        // Load the product and its relationships
        $product->load('category', 'tag', 'brand', 'seller', 'reviews', 'features', 'keyFeatures', 'specifications', 'images');
        // Create an array of the product's relationships to be passed as individual props to the Vue component
        $props = [
            'product' => $product,
            'category' => $product->category,
            'tag' => $product->tag,
            'brand' => $product->brand,
            'seller' => $product->seller,
            'reviews' => $product->reviews,
            'features' => $product->features,
            'keyFeatures' => $product->keyFeatures,
            'specifications' => $product->specifications,
            'images' => $product->images,
        ];

        // Return a JSON response with the product and its relationships as individual props
        return Inertia::render('Products/ProductShow', $props);
    }

    /**
     * Show/view a product resource - show() alternative
     * @param int $id
     * @return JsonResponse
    */
    public function showIt(int $id): JsonResponse
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

    /**
     * Store a new product
     * @param integer $seller_id
     * return JSON data
     */
    public function productsBySeller(int $seller_id): JsonResponse
    {
        $products = Product::query()
            ->where('seller_id', '=', $seller_id)
            ->latest()
            ->get();
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $seller = Seller::findOrFail($seller_id);
        $user = User::query()->where('id', '=', $seller->user_id)->first();
        return response()->json([
            "products" => $products,
            "brands" => $brands,
            "categories" => $categories,
            "tags" => $tags,
            "seller" => $seller,
            "user" => $user
        ]);
    }

    /**
     * products by brand
     * @param int $brand_id
     * @return JsonResponse
     *  */
    public function productsByBrand(int $brand_id): JsonResponse
    {
        $products = Product::query()
            ->where('brand_id', '=', $brand_id)
            ->latest()
            ->get();
        $brand = Brand::findOrFail($brand_id);
        $categories = Category::all();
        $tags = Tag::all();
        $sellers = Seller::query()->where('brand_id', '=', $brand_id)->get();
        return response()->json([
            "products" => $products,
            "brand" => $brand,
            "categories" => $categories,
            "tags" => $tags,
            "sellers" => $sellers
        ]);
    }

    /**
     * products by category
     * @param int $category_id
     * @return JsonResponse
     */
    public function productsByCategory(int $category_id): JsonResponse
    {
        $products = Product::query()->where('category_id', '=', $category_id)->latest()->get();
        $brands = Brand::all();
        $category = Category::findOrFail($category_id);
        $tags = Tag::all();
        $sellers = Seller::query()->where('category_id', '=', $category_id)->latest()->get();

        return response()->json([
            "products" => $products,
            "brands" => $brands,
            "categories" => $category,
            "tags" => $tags,
            "sellers" => $sellers
        ]);
    }

    /**
     * products by tag
     * @param int $tag_id
     * @return JsonResponse
     */
    public function productsByTag($tag_id): JsonResponse
    {
        $products = Product::query()
            ->where('brand_id', '=', $tag_id)
            ->latest()
            ->get();
        $brands = Brand::all();
        $categories = Category::all();
        $tag = Tag::findOrFail($tag_id);
        $sellers = Seller::query()->where('tag_id', '=', $tag_id)->get();
        return response()->json([
            "products" => $products,
            "brands" => $brands,
            "categories" => $categories,
            "tag" => $tag,
            "sellers" => $sellers
        ]);
    }

    /**
     * Price Filters - show products in a given price range
     * @param Request $request
     * @return JsonResponse
     */
    public function sortByPrice(Request $request): JsonResponse
    {
        $payload = $request->json();
        $priceFrom = $payload['lowestPrice'];
        $priceTo = $payload['highestPrice'];

        $products = Product::query()
            ->where('price', '>=', $priceFrom)
            ->where('price', '<=', $priceTo)
            ->latest()
            ->get();

        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $sellers = Seller::all();

        return response()->json([
            "products" => $products,
            "brands" => $brands,
            "categories" => $categories,
            "tags" => $tags,
            "sellers" => $sellers
        ]);
    }

    /**
     * return only products that are in stock
     * @param Request $request
     * @return JsonResponse
    */
    public function inStockOnly(Request $request): JsonResponse
    {
        $products = Product::query()
            ->where('in_stock')
            ->latest()
            ->get();
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

    /**
     * Search for products based on given keywords.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with the search results
     */
    public function search(Request $request): JsonResponse
    {
        // Retrieve the search query parameter from the request
        $query = $request->input('q');

        // Get the products that match the search query
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        // Return the search results as JSON
        return response()->json(['results' => $products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sort(Request $request): JsonResponse
    {
        $sortType = $request->input('sort_type');
        $sortField = $request->input('sort_field');

        $query = Product::query();

        // apply search query if present
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%");
        }

        // apply sort
        $query->orderBy($sortField, $sortType);

        // get results
        $products = $query->get();

        // return as JSON
        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Get related products for the given product.
     *
     * @param int $productId
     * @return JsonResponse
     */
    protected function relatedProducts(int $productId): JsonResponse
    {
        // Retrieve the product instance
        $product = Product::findOrFail($productId);

        // Retrieve the tag ids of the product
        $tagIds = $product->tags->pluck('id')->toArray();

        // Retrieve the related products based on shared tags
        $relatedProducts = Product::where('id', '!=', $productId)
            ->where(function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds)
                    ->orWhereHas('tags', function ($query) use ($tagIds) {
                        $query->whereIn('tags.id', $tagIds);
                    });
            })
            ->take(10)
            ->get();

        return response()->json($relatedProducts);
    }
}
