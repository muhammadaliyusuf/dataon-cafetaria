<?php

// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->orderBy('order_time', 'desc')
            ->get();

        return view('menu.order', compact('orders'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|integer',
            'payment_method' => 'required|in:Cash,Debit Card,E-Wallet',
            'notes' => 'nullable|string'
        ]);

        // Hitung total amount
        $total_amount = $request->quantity * $request->unit_price;

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => auth()->id(), // Pastikan user sudah login
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_amount' => $total_amount,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'order_time' => now()
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }

    public function destroy(Request $request, Order $order, $id) {
        //get product by ID
        $product = Order::findOrFail($id);

        //delete product
        $product->delete();

        return redirect('/order');
    }
}
