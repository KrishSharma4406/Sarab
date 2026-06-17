<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Products extends Model
{
    protected $fillable = [
    'name',
    'sku',
    'price',
    'discount_price',
    'status',
    'image',
    'description',
    'category_id'
];
public function category()
{
    return $this->belongsTo(Category::class,'category_id');
}
}

