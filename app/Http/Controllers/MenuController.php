<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $categories = Category::with('menus')->get();
        return view('menu.index', compact('categories'));
    }

    // Menangani proses pemesanan
    public function order(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Ambil data menu yang dipesan
        $menu = Menu::findOrFail($request->menu_id);

        // Cek ketersediaan menu
        if (!$menu->is_available) {
            return back()->withErrors(['menu_id' => 'Menu tidak tersedia.']);
        }

        // Hitung total harga
        $totalAmount = $menu->price * $request->quantity;

        // Buat order baru
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalAmount,
            'payment_method' => 'Cash', // Default payment method
            'order_time' => now(),
            'notes' => $request->notes,
        ]);

        // Buat order item
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'unit_price' => $menu->price,
            'subtotal' => $totalAmount,
        ]);

        // Redirect ke halaman order dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}