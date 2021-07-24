<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_id',
        'user_id',
        'title',
        'short_text',
        'date',
        'duration',
        'password',
        'trainee_limit',
    ];
}
