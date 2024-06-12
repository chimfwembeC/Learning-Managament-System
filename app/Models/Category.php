<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model  implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_category');
    }
}
