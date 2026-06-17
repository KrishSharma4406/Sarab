<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'badge_text',

        'title_line_1',
        'title_highlight',
        'title_line_2',

        'description',

        'button_text',
        'button_link',

        'video_text',
        'video_url',

        'stat1_number',
        'stat1_text',

        'stat2_number',
        'stat2_text',

        'stat3_number',
        'stat3_text',

        'stat4_number',
        'stat4_text',

        'card1_title',
        'card1_subtitle',

        'card2_title',
        'card2_subtitle',

        'card3_title',
        'card3_subtitle',
    ];
}