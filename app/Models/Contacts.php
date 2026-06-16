<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'company_name',
        'phone',
        'email',
        'opening_hours',
        'address',
        'group_dining',
        'google_map',
        'facebook',
        'instagram',
        'twitter',
        'linkedin'
    ];
}