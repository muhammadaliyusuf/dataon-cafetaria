<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    // Tambahkan relasi ke Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
