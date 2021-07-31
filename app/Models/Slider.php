<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'overlay',
        'hero_text',
        'sub_text',
        'widget',
        'status',
    ];
}
