<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $orders = Order::query();

        // Check if a status filter is applied and add it to the query
        if ($request->has('status')) {
            $orders->where('status', $request->input('status'));
        }

        // Check if a sorting option is applied and sort accordingly
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                default:
                    $orders->latest();
                    break;
                case 'date_asc':
                    $orders->orderBy('created_at', 'asc');
                    break;
                case 'date_desc':
                    $orders->orderBy('created_at', 'desc');
                    break;
                case 'total_asc':
                    $orders->orderBy('total', 'asc');
                    break;
                case 'total_desc':
                    $orders->orderBy('total', 'desc');
                    break;
            }
        }

        // Fetch paginated results
        $perPage = 10;
        $orders = $orders->paginate($perPage);

        // Return orders as JSON
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // validate request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'subtotal' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'shipping' => 'required|numeric',
            'total' => 'required|numeric',
            'payment_gateway' => 'required|string',
            'payment_id' => 'required|string',
            'notes' => 'nullable|string',
            'status' => 'required|string',
            'items' => 'required|array'
        ]);

        // create new order
        $order = Order::create($validatedData);

        // create order items
        foreach ($validatedData['items'] as $item) {
            $order->items()->create($item);
        }

        return response()->json(['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function update(Request $request, Order $order): JsonResponse
    {
        // validate request data
        $validatedData = $request->validate([
            'status' => 'required|string'
        ]);

        // update order status
        $order->status = $validatedData['status'];
        $order->save();

        return response()->json(['order' => $order]);
    }
}
