<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Question extends Model implements Auditable
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable;
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
