<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    use HasFactory;
    protected $fillable = ['name', 'position', 'page_id', 'data'];
    protected $casts = ['data' => 'array',];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
