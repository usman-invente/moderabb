<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'title',
        'url',
        'lesson_image',
        'short_text',
        'full_text',
        'downloadable_files',
        'add_pdf',
        'add_audio',
        'media_type',
        'video',
        'video_file',
        'published',
        'live_lesson',
    ];
}
