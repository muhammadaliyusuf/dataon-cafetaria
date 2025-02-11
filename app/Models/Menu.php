<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
    ];

    protected $casts = [
        'price' => 'integer',
        'is_available' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
