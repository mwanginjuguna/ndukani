<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number', 'user_id', 'subtotal', 'discount', 'tax', 'shipping', 'total', 'payment_gateway', 'payment_id', 'notes', 'status'
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the items associated with the order.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the total quantity of items in the order.
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        return $this->items()->sum('quantity');
    }

    /**
     * Get the total amount of discounts applied to the order.
     *
     * @return float
     */
    public function getTotalDiscount(): float
    {
        return $this->discount;
    }

    /**
     * Get the total tax amount of the order.
     *
     * @return float
     */
    public function getTotalTax(): float
    {
        return $this->tax;
    }

    /**
     * Get the total shipping amount of the order.
     *
     * @return float
     */
    public function getTotalShipping(): float
    {
        return $this->shipping;
    }

    /**
     * Get the total amount of the order including all taxes, discounts, and shipping.
     *
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->total;
    }
}
