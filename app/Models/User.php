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
        'name',
        'email',
        'password',
        'title',
        'telephone',
        'dob',
        'sex',
        'country',
        'avatar_location',
        'academic_rank',
        'nationality',
        'country_of_residence',
        'facbook',
        'twitter',
        'linkedin',
        'instagram',
        'passport',
        'photo_academic_degree',
        'cv',
        'bank_name',
        'bank_country',
        'ibn_number',
        'c_person',
        'status',
        'roll_id',
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
}
