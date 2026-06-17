<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSection extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'highlight_text',
        'description',
        'old_price',
        'new_price',
        'button_text',
        'button_link',
        'image',
        'hours',
        'minutes',
        'seconds',
        'status'
    ];
}