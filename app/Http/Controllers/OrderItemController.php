<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $orderItems = OrderItem::with('order', 'product')->get();

        $products = Product::whereIn('id', $orderItems->pluck('product_id'))->get();

        $orderIds = $orderItems->pluck('order_id')->unique();
        $orders = Order::whereIn('id', $orderIds)->get();

        return Inertia::render('OrderItems/Index', [
            'orders' => $orders,
            'products' => $products,
            'orderItems' => $orderItems,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param OrderItem $orderItem
     * @return Response
     */
    public function show(OrderItem $orderItem): Response
    {
        $orderItem->load('order', 'product');

        return Inertia::render('OrderItems/Show', [
            'orderItem' => $orderItem,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $data['subtotal'] = $data['quantity'] * $data['price'];

        OrderItem::create($data);

        return redirect()->back()->with('success', 'Order item created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderItem $orderItem
     * @return RedirectResponse
     */
    public function destroy(OrderItem $orderItem): RedirectResponse
    {
        $orderItem->delete();

        return redirect()->back()->with('success', 'Order item deleted successfully.');
    }
}
