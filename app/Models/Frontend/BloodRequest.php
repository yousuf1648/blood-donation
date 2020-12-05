<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_age',
        'patient_gender',
        'blood_group',
        'blood_bag',
        'hospital_name',
        'hospital_address',
        'hospital_area',
        'blood_needed_date',
        'blood_needed_time',
        'patient_relative',
        'patient_relative_contact',
        'reason_for_blood',
        'report_image',
        'status'
    ];
}
