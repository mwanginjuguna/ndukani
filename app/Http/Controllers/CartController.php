<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Add a product to the cart for a user.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with success or error message
     */
    public function addToCart(Request $request): JsonResponse
    {
        // dd($request);

        // Retrieve product and user IDs from the request
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');

        // Retrieve the product with the given ID
        $product = Product::find($productId);

        // Check if the product exists
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Check if the product is already in the user's cart
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // If the product is already in the cart, increase the quantity
            $cartItem->quantity += $request->input('quantity');
            $cartItem->save();
        } else {
            // If the product is not in the cart, create a new cart item
            $cartItem = new Cart([
                'product_id' => $productId,
                'user_id' => $userId,
                'quantity' => $request->input('quantity')
            ]);
            $cartItem->save();
        }

        $newCartItems = Cart::where('user_id', $userId)->get();

        return response()->json(['message' => 'Product added to cart.', 'newCartItems' => $newCartItems]);
    }

    /**
     * Get the cart items for a user.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with the cart items
     */
    public function getCart(Request $request)
    {
        // Retrieve the user ID from the request
        $userId = $request->input('user_id');

        // Retrieve the cart items for the user
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();
        //dd($cartItems);

        return response()->json(['cart' => $cartItems]);
    }

    /**
     * Update the quantity of a product in the user's cart.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with success or error message
     */
    public function updateCart(Request $request): JsonResponse
    {
        // Retrieve product and user IDs and new quantity from the request
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');
        $quantity = $request->input('quantity');

        // Update the cart item with the new quantity
        Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->update(['quantity' => $quantity]);

        return response()->json(['message' => 'Cart updated.']);
    }

    /**
     * Remove a product from the user's cart.
     *
     * @param Request $request The HTTP request object
     * @return JsonResponse The response with success or error message
     */
    public function removeFromCart(Request $request): JsonResponse
    {
        // Retrieve product and user IDs from the request
        $productId = $request->input('product_id');
        $userId = $request->input('user_id');

        // Delete the cart item with the given IDs or reduce quantity by 1
        $cart = Cart::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($cart->quantity === 1) {
            $cart->delete();
        } else {
            $cart->quantity -= 1;
            $cart->save();
        }

        $newCartItems = Cart::where('user_id', $userId)->get();

        // Return a JSON response indicating success with new cart items
        return response()->json(['success' => true, 'newCartItems' => $newCartItems]);
    }
}
