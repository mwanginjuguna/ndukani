<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function index(Product $product)
    {
        $reviews = $product->reviews()->orderBy('created_at', 'desc')->get();
        return response()->json(['reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function store(Request $request, Product $product): JsonResponse
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review = new Review([
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);

        $product->reviews()->save($review);

        return response()->json(['review' => $review], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @param  Review  $review
     * @return JsonResponse
     */
    public function show(Product $product, Review $review): JsonResponse
    {
        return response()->json(['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Product  $product
     * @param  Review  $review
     * @return JsonResponse
     */
    public function update(Request $request, Product $product, Review $review): JsonResponse
    {
        $validatedData = $request->validate([
            'rating' => 'integer|min:1|max:5',
            'comment' => 'string|max:255',
        ]);

        $review->update($validatedData);

        return response()->json(['review' => $review]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Review  $review
     * @return JsonResponse
     */
    public function destroy(Product $product, Review $review): JsonResponse
    {
        $review->delete();

        return response()->json(null, 204);
    }
}
