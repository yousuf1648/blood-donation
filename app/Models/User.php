<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'donor_id',
        'is_donor',
        'name',
        'username',
        'email',
        'weight',
        'age',
        'height',
        'disease',
        'smoker',
        'marital_status',
        'blood_group',
        'birthday',
        'gender',
        'last_donate',
        'present_address',
        'permanent_address',
        'first_mobile',
        'second_mobile',
        'thana',
        'area',
        'post_code',
        'email_verified_at',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Admin\Role');
    }
}
