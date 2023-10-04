<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonUsefulLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'link',
        'file',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
