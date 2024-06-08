<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id', 'department_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
