<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fqa extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'slug',
        'answere',
        'status',
    ];
}
