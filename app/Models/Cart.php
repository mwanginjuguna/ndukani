<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\JsonResponse;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'quantity'];

    // product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // getCartItems
    public static function getCartItems($userId)
    {
        return Cart::where('user_id', $userId)->with('product')->get();
    }

    /**
     * add a product to Cart
     * If the cart already exists, update the quantity to the new value.
     * @param int $userId The ID of the user
     * @param int $productId The ID of the product
     * @param int $quantity The new quantity for the cart item
     * @return void
    */
    public static function addToCart($userId, $productId, $quantity): void
    {
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        // check if cart exists or create a new Cart
        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }
    }


    /**
     * Update the cart for a given user and product.
     * If the cart already exists, update the quantity to the new value.
     * If the quantity is 0 or less, remove the cart item.
     * @param int $userId The ID of the user
     * @param int $productId The ID of the product
     * @param int $quantity The new quantity for the cart item
     */
    public static function updateCart(int $userId, int $productId, int $quantity)
    {
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            if ($quantity <= 0) {
                $cart->delete();
            } else {
                $cart->quantity = $quantity;
                $cart->save();
            }
        }
    }

    public static function clearCart($userId)
    {
        Cart::where('user_id', $userId)->delete();
    }
}
