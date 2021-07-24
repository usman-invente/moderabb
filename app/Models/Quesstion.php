<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quesstion extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'question',
        'question_image',
        'score',
        'course_id',
        'lesson_id',
        'tests',
        'option_text_1',
        'explanation_1',
        'correct_1',
        'option_text_2',
        'explanation_2',
        'correct_2',
        'option_text_3',
        'explanation_3',
        'correct_3',
        'option_text_4',
        'explanation_4',
        'correct_4',
    ];
}
