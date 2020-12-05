<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'meta_keyword',
        'meta_tag',
        'email',
        'address',
        'phone',
        'favicon',
        'logo',
        'twitter_api',
        'google_map',
        'icon',
        'link',
    ];
}
