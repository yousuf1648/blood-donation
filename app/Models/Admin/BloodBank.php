<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'dis_id',
        'blood_bank_name',
        'slug',
        'blood_bank_address',
        'blood_bank_number',
        'status',
    ];
}
