<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'page_title',
        'price',
        'stock',
    ];

    public function components()
    {
        return $this->hasMany(Component::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
