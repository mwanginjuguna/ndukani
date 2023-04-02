<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Add a product to the user's wishlist.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with success or error message
     */
    public function addToWishlist(Request $request): JsonResponse
    {
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');

        $wishlist = new Wishlist();
        $wishlist->product_id = $productId;
        $wishlist->user_id = $userId;
        $wishlist->save();

        return response()->json(['message' => 'Product added to wishlist.']);
    }

    /**
     * Remove a product from the user's wishlist.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with success or error message
     */
    public function removeFromWishlist(Request $request): JsonResponse
    {
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');

        Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        return response()->json(['message' => 'Product removed from wishlist.']);
    }

    /**
     * Get the user's wishlist.
     *
     * @param int $userId The ID of the user whose wishlist to retrieve
     * @return JsonResponse The response with the user's wishlist
     */
    public function getWishlist(int $userId): JsonResponse
    {
        $wishlist = Wishlist::where('user_id', $userId)->get();

        return response()->json(['wishlist' => $wishlist]);
    }
}
