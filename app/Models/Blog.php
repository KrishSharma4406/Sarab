<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    'title',
    'category',
    'author',
    'comments',
    'publish_date',
    'description',
    'image',
    'status',
];
}
