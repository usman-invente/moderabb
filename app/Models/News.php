<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'slug',
        'tags',
        'featured_image',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
