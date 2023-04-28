<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;
use Stripe\Stripe as StripeGateway;
use Stripe\StripeClient;
use Throwable;

class PaymentController extends Controller
{
    /**
     * Make order payment using PayPal
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     * @throws Throwable
     */
    public function payWithPayPal(Request $request, Order $order): JsonResponse
    {
        //dd($request);

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
                        'paypal_transaction_id' => $paypalOrder['id'],
                        'transaction_status' => $paypalOrder['status']
                    ]);
                    return response()->json($paypalOrder);
                }
            }
        }

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong when initializing paypal order.',
            'paypal_order' => $paypalOrder
        ]);
    }

    /**
     * Capture paypal transaction after successful Payments.
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     * @throws Throwable
     */
    public function capturePayPal(Request $request, Order $order): JsonResponse
    {
        $payPalOrderId = $request->input('orderId');

        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->capturePaymentOrder($payPalOrderId);

        if (isset($response->status) && $response->status === 'COMPLETED')
        {
            $payerId = $request->input('payerId');
            $paidAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payerName = $response['purchase_units'][0]['shipping']['name']['full_name'];
            $paypalFacilitatorAccessToken = $request->input('facilitatorAccessToken');

            // update payment details
            $payment = Payment::query()->where('order_id', $order->id)->first();
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
        }
        elseif (isset($response['debug_ID']))
        {
            $paymentError = [
                "name" => $response['name'],
                "debug_ID" => $response['debug_ID'],
                "error" => $response['message'],
                "details" => $response['details']
            ];
            // notify admin & user paypent failed

            // respond with payment error
            return response()->json($paymentError);
        }
        else
        {
            return response()->json($response);
        }
    }

    /**
     * Handle payment cancellation by user
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function cancelPayPal(Request $request, Order $order): JsonResponse
    {
        $payment = Payment::where('order_id', $order->id);
        $payment->transaction_status = 'CANCELLED';
        $payment->save();
        return response()->json([
            "status" => 'Cancelled',
            "message" => "Payment Cancelled. Try again."
        ]);
    }

    /**
     * Initialize Stripe payment
     * @param
     * @return
     */
    public function payWithStripe(Request $request, Order $order)
    {
        $amount = 60.50;
        $currency = 'usd';
        $orderNumber = $order->order_number;

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => route('stripeComplete', $order->id),
            'cancel_url' => route('stripeFail', $order->id),
            'line_items' => [
                [
                    'price_data' => [
                        'unit_amount' => $amount * 100,
                        'currency' => $currency,
                        'product_data' => [
                            'name' => $orderNumber,
                            ]
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment'
        ]);

        return response()->json($checkout);
    }

    /**
     * Initialize Stripe payment
     * @param
     * @return
     */
    public function stripeComplete(Request $request, Order $order)
    {
        return response()->json([
            "status" => 200,
            "message" => "successful stripeComplete call."
        ]);
    }

    /**
     * Initialize Stripe payment
     * @param
     * @return
     */
    public function stripeFail(Request $request, Order $order)
    {
        return response()->json([
            "status" => 200,
            "message" => "successful stripeFail call."
        ]);
    }
}
