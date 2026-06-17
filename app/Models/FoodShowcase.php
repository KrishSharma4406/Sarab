<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodShowcase extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'highlight_text',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}