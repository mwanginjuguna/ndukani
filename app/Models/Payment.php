<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // ID of the user who made the payment
        'order_id', // ID of the order that the payment is associated with
        'paypal_transaction_id', // PayPal transaction ID, if applicable
        'stripe_session_id', // Stripe session ID, if applicable
        'paypal_payer_id', // PayPal payer ID, if applicable
        'paypal_facilitator_access_token_id', // PayPal facilitator access token ID, if applicable
        'total_paid', // Total amount paid
        'user_name', // Name of the user who made the payment
        'payer_country_code', // Country code of the user who made the payment
        'transaction_status', // Payment transaction status
        'transaction_debug_id', // Payment transaction debug ID
        'transaction_message', // Payment transaction message
        'transaction_name', // Name of the payment transaction
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that the payment is associated with.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
