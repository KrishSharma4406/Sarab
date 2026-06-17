<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'is_active'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}