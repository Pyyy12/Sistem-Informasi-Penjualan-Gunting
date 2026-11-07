<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items']);

        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in(['pending', 'processing', 'shipped', 'completed', 'cancelled']),
            ],
            'payment_status' => [
                'required',
                Rule::in(['pending', 'paid', 'failed']),
            ],
        ]);

        if ($validated['status'] === 'cancelled' && $order->status !== 'cancelled') {
            if ($order->status !== 'pending') {
                return back()->with('error', 'Pesanan yang sudah diproses tidak dapat dibatalkan melalui menu ini.');
            }

            $order->load('items');

            foreach ($order->items as $item) {
                if ($item->product_id) {
                    \App\Models\Product::whereKey($item->product_id)
                        ->increment('stock', $item->quantity);
                }
            }
        }

        $order->update($validated);

        return back()->with('success', 'Pesanan berhasil diperbarui.');
    }
}