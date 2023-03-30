<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    // all products
    public function index(Request $request)
    {
        $products = Product::all();
        return response()->json(["products" => $products]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Products/ProductCreate');
    }

    /*
     * Store a new product
     * @param Illuminate\Http\Request
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
}
