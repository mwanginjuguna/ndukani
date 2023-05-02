<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Srmklive\PayPal\Services\PayPal;
use Stripe\Exception\ApiErrorException;
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
                    $payment = Payment::where('order_id', $order->id)->first();

                    if ($payment) {
                        $payment->paypal_transaction_id = $paypalOrder['id'];
                        $payment->transaction_status = $paypalOrder['status'];
                        $payment->save();
                    } else {
                        Payment::updateOrCreate([
                            'user_id' => $request->input('user_id'),
                            'order_id' => $order->id,
                            'paypal_transaction_id' => $paypalOrder['id'],
                            'transaction_status' => $paypalOrder['status']
                        ]);
                    }

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
     * @return Response
     */
    public function cancelPayPal(Request $request, Order $order): Response
    {
        $payment = Payment::where('order_id', $order->id)->first();
        $payment->transaction_status = 'CANCELLED';
        $payment->save();
        return Inertia::render('Orders/PaymentStatus', [
            "status" => 'Cancelled',
            "message" => "Payment Cancelled. Try again.",
            "order" => $order
        ]);
    }

    /**
     * Initialize Stripe payment
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     * @throws ApiErrorException
     */
    public function payWithStripe(Request $request, Order $order): JsonResponse
    {
        $amount = 6.50;
        $currency = 'usd';
        $orderNumber = $order->order_number;

        // init stripe client
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        // init stripe checkout session
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

        if (isset($checkout['id'])) {
            // Get the payment record from the database based on its ID
            $payment = Payment::where('order_id', $order->id)->first();

            // Check if the payment record exists
            if ($payment) {
                // Payment record already exists in the database, update stripe session
                $payment->stripe_session_id = $checkout['id'];
                $payment->save();
                return response()->json($checkout);
            } else {
                // Payment record doesn't exist in the database, create new
                Payment::create([
                    'user_id' => $request->input('user_id') ?? auth()->id(),
                    'order_id' => $order->id,
                    'stripe_session_id' => $checkout['id'],
                    'transaction_status' => $checkout['status']
                ]);
            }
        }

        return response()->json($checkout);
    }

    /**
     * Initialize Stripe after-payment webhook
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function stripeWebhook(Request $request, Order $order): JsonResponse
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_KEY');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $payload = @file_get_contents('php://input');
        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\Stripe\Exception\SignatureVerificationException $exception) {
            echo 'Webhook error while validating signature!';
            http_response_code(400);
            exit();
        }

        if ($request->type == 'checkout.session.completed') {
            Log::info('Stripe pay completed!');
        }
        Log::info('Stipe webhook hit!');

        return response()->json([
            "status" => 200,
            "message" => "successful stripeComplete call."
        ]);
    }

    /**
     * Initialize Stripe payment
     * @param Request $request
     * @param Order $order
     * @return Response
     * @throws ApiErrorException
     */
    public function stripeComplete(Request $request, Order $order): Response
    {
        $payment = Payment::where('order_id', $order->id)->first();

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $stripeSession = $stripe->checkout->sessions->retrieve(
            $payment->stripe_session_id
        );

        // dd($stripeSession);

        // update payment details
        $payment->total_paid = $stripeSession['amount_total'];
        $payment->user_name = $stripeSession['customer_details']['name'];
        $payment->payer_country_code = $stripeSession['customer_details']['address']['country'];
        $payment->transaction_status = $stripeSession['status'];
        $payment->save();

        // update order details
        $order->payment_gateway = 'stripe';
        $order->payment_id = $stripeSession['id'];
        $order->is_paid = true;
        $order->status = 'shipping';
        $order->notes = $stripeSession['currency'].' '.($stripeSession['amount_total']/100).' paid by'.$stripeSession['customer_details']['email'];
        $order->save();


        return Inertia::render('Orders/PaymentStatus', [
            "status" => "success",
            "message" => "successful stripeComplete call.",
            "order" => $order
        ]);
    }

    /**
     * Initialize Stripe payment-failed!
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function stripeFail(Request $request, Order $order): Response
    {
        return Inertia::render('Orders/PaymentStatus', [
            "status" => "failed",
            "message" => "Payment was not successful.",
            "order" => $order
        ]);
    }
}
