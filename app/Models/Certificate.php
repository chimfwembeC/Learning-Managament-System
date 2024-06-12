<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Certificate extends Model  implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'student_id', 'course_id', 'certificate_code', 'issued_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
