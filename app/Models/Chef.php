<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'experience',
        'image',
        'status'
    ];
}