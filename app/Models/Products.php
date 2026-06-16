<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
    'name',
    'sku',
    'price',
    'discount_price',
    'status',
    'image',
    'description'
];
}
