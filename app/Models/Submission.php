<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Submission extends Model  implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'quiz_id', 'student_id', 'score',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quizze::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
