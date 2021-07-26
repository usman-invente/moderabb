<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagemanager extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'page_image',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published',
        'sidebar',
    ];
}
