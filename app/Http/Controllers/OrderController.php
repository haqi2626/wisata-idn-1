<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller

{
    // Get all orders
    public function index() {
        $orders = Order::all();
        return response()->json($orders);
    }

    // Store a new order
    public function store(Request $request) {
        $request->validate([
            'order_number' => 'required|unique:orders',
            'customer_name' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'order_number' => $request->order_number,
            'customer_name' => $request->customer_name,
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    // Show order by ID
    public function show($id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }
}
