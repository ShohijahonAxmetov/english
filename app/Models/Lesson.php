<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
    ];

    public function videos()
    {
        return $this->hasMany(LessonVideo::class);
    }

    public function exercises()
    {
        return $this->hasMany(LessonExercise::class);
    }

    public function vocabularies()
    {
        return $this->hasMany(LessonVocabulary::class);
    }

    public function usefulLinks()
    {
        return $this->hasMany(LessonUsefulLink::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
