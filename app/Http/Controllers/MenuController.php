<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('menus')->get();
        return view('menu.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create', [
            'categories' => Category::all(),
            'menus' => Menu::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:12',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('menu-images');
        }

        Menu::create($validated);

        return redirect()->route('menu.create')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'menu' => $menu,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:12',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validated['image'] = $request->file('image')->store('menu-images');
        }

        $menu->update($validated);

        return redirect()->route('menu.create')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.create')
            ->with('success', 'Menu berhasil dihapus!');
    }

    /**
     * Process the menu order.
     */
    public function order(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($validated['menu_id']);

        if (!$menu->is_available) {
            return back()->withErrors(['menu_id' => 'Menu tidak tersedia.']);
        }

        $totalAmount = $menu->price * $validated['quantity'];

        Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $totalAmount,
            'payment_method' => 'Cash',
            'order_time' => now(),
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('order.create')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
