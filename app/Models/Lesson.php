<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Lesson extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'course_id', 'title', 'content',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function progresses()
    {
        return $this->hasMany(LessonProgress::class);
    }
}
