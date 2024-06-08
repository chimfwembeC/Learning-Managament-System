<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id', 'question_text',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quizze::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
