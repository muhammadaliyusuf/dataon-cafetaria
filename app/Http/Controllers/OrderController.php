<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan daftar order pengguna
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('order_time', 'desc')->get();
        return view('menu.order', compact('orders'));
    }

}
