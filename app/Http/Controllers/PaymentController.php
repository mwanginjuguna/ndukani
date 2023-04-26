<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Make order payment using PayPal
     */
    public function payWithPayPal(Request $request, Order $order)
    {

    }
}
