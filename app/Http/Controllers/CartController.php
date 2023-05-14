<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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

        // ensure cart is clean: i.e all cart items have quantity = or > 1
        foreach ($cartItems as $key => $item) {
            if ($item->quantity < 1) {
                Cart::where('id', $item->id)->delete();
                $cartItems->forget($key);
            }
        }

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

        if ($cart->quantity === 1 || $cart->quantity < 1) {
            $cart->delete();
        } else {
            $cart->quantity -= 1;
            $cart->save();
        }

        $newCartItems = Cart::where('user_id', $userId)->get();

        // Return a JSON response indicating success with new cart items
        return response()->json(['success' => true, 'newCartItems' => $newCartItems]);
    }

    /**
     * Process checkout request
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function checkoutPay(Request $request): JsonResponse
    {
        $userId = $request->input('user_id');

        // get cart items belonging to this user
        $response = $this->getCart($request);
        $content = $response->getContent();

        $cartItems = json_decode($content)->cart;

        // get total from cartItems
        $total = 0;
        foreach ($cartItems as $item) {
            $itemTotal = $item->product->price * $item->quantity;
            $total += $itemTotal;
        }

        // create new order
        $order = Order::query()
            ->where('user_id', $userId)
            ->where('subtotal', $total)
            ->first();

        if (!$order) {
            // generate random order_number
            $length = 10; // The length of the random string
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $orderNumber = 'DUKA_#';
            for ($i = 0; $i < $length; $i++) {
                $orderNumber .= $characters[random_int(0, strlen($characters) - 1)];
            }
            $order = Order::create([
                'user_id' => $userId,
                'order_number' => $orderNumber,
                'subtotal' => $total,
            ]);
        } else {
            $order->subtotal = $total;
            $order->save();
        }

        //create order items
        foreach ($cartItems as $item) {
            $order->items->create([
                'product_id' => $item->product->id,
                'order_id' => $order->id,
                'price' => $item->product->price * $item->quantity,
                'quantity' => $item->quantity
            ]);
        }

        // delete cart items from db
        foreach ($cartItems as $cartItem) {
            $cart = Cart::where('id', $cartItem->id)->first();
            $cart->delete();
        }

        // retrieve the ordernumber incase this function was called to update an existing order at line 181
        $orderNumber = $order->order_number;

        // return json with order and success message. The user will be redirected in frontend.
        return response()->json([
            "message" => "Success. Order ${orderNumber} has been created successfully. We will redirect you to payments Page.",
            "order" => $order
        ]);
        // redirect to payment page
        // return redirect()->route('order.show', $order->id);
    }
}
