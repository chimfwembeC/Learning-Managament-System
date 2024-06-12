<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class AssignmentSubmission extends Model  implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'assignment_id', 'student_id', 'file_path', 'submitted_at',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
