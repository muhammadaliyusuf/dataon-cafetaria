<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'quantity',
        'unit_price',
        'total_amount',
        'payment_method',
        'order_time',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'integer',
        'unit_price' => 'integer',
        'quantity' => 'integer',
        'order_time' => 'datetime',
    ];

    public function user()  // Ubah dari users() ke user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()  // Ubah dari menus() ke menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
