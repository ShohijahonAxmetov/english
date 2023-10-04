<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonVocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'link',
        'vocabularies',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
