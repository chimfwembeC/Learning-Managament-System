<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quizze::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'course_department');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_category');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function courseMaterials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
