<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'code',
        'type',
        'amount',
        'advert_perce',
        'advert_name',
        'expires_at',
        'min_price',
        'per_user_limit',
        'status',
    ];
}
