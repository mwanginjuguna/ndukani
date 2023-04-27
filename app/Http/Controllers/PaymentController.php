<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PaymentController extends Controller
{
    /**
     * Make order payment using PayPal
     */
    public function payWithPayPal(Request $request, Order $order)
    {
        $amount = $order->getTotalAmount();

        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $paypalOrder = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $request->input('currency'),
                        "value" => $amount,
                    ]
                ]
            ]
        ]);

        if (isset($paypalOrder['id']) && $paypalOrder['id'] != null) {
            foreach ($paypalOrder['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    Payment::updateOrCreate([
                        'user_id' => $request->input('user_id'),
                        'order_id' => $order->id,
                        'paypal_transaction_id' => $provider['id'],
                        'transaction_status' => $provider['status']
                    ]);
                    return response()->json($paypalOrder);
                }
            }
        }

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong when initializing paypal order',
            'paypal_order' => $paypalOrder
        ]);
    }

    /**
     * Capture paypal transaction after successful Payments.
     */
    public function payPalCapture(Request $request, Order $order)
    {
        $payPalOrderId = $request->input('orderId');

        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->capturePaymentOrder($payPalOrderId);

        if (isset($response->status) && $response->status === 'COMPLETED') {
            $payment = Payment::where('order_id', $order->id);

            // update payment details
            $payerId = $request->input('payerId');
            $paidAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payerName = $response['purchase_units'][0]['shipping']['name']['full_name'];

            $paypalFacilitatorAccessToken = $request->input('facilitatorAccessToken');
            $payment->transaction_status = $response['status'];
            $payment->paypal_transaction_id = $payPalOrderId;
            $payment->paypal_payer_id = $payerId;
            $payment->paypal_facilitator_access_token_id = $paypalFacilitatorAccessToken;
            $payment->total_paid = $paidAmount;
            $payment->user_name = $payerName;
            $payment->payer_country_code = $response['purchase_units'][0]['shipping']['address']['country_code'];
            $payment->save();

            // update order class
            $order->is_paid = true;
            $order->payment_gateway = 'paypal';
            $order->payment_id = $payPalOrderId;
            $order->status = 'processing';
            $order->save();

            // send emails to user and admin

            // return response
            return response()->json($response);
        } elseif (isset($response['debug_ID'])) {
            $paymentError = [
                "name" => $response['name'],
                "debug_ID" => $response['debug_ID'],
                "error" => $response['message'],
                "details" => $response['details']
            ];
            // notify admin & user paypent failed

            // respond with payment error
            return response()->json($paymentError);
        } else {
            return response()->json($response);
        }
    }

    /**
     * Handle payment cancellation by user
     */
    public function cancelPayPal(Request $request, Order $order)
    {
        $payment = Payment::where('order_id', $order->id);
        $payment->transaction_status = 'CANCELLED';
        $payment->save();
        return response()->json([
            "status" => 'Cancelled',
            "message" => "Payment Cancelled. Try again."
        ]);
    }
}
