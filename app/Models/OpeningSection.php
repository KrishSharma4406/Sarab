<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningSection extends Model
{
    protected $fillable = [
        'day_name',
        'opening_time',
        'closing_time',
        'is_closed'
    ];
}