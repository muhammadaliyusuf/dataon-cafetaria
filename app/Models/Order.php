<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'payment_method',
        'order_time',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'integer',
        'order_time' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'order_items')
            ->withPivot(['quantity', 'unit_price', 'subtotal']);
    }
}
