<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'teachers',
        'eccbody_id',
        'category_id',
        'bag_type',
        'ctitle',
        'slug',
        'description',
        'price',
        'course_image',
        'price_certificate',
        'certificate',
        'start_date',
        'end_date',
        'level',
        'voltage',
        'duration',
        'recording_url',
        'published',
        'featured',
        'trending',
        'popular',
        'free',
        'c_purchase',
        'goals',
        'requirements',
        'outputs',
        'target_group',
        'sponsor_name',
        'media_type',
        'video',
        'video_file',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
