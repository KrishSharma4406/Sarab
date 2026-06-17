<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'small_title',
        'title_line_1',
        'title_highlight',
        'description',

        'experience_years',
        'experience_text',

        'main_image',
        'small_image',

        'feature1_title',
        'feature1_description',

        'feature2_title',
        'feature2_description',

        'feature3_title',
        'feature3_description',

        'button_text',
        'button_link'
    ];
}