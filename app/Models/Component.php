<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    use HasFactory;
    protected $fillable = ['name', 'position', 'product_id', 'data'];
    protected $casts = ['data' => 'array',];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
