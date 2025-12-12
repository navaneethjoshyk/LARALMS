<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Student;
use App\Models\Professor;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'credits',
    ];

    // Students taking this course (via courses_students pivot)
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(
            Student::class,
            'courses_students', // your existing pivot
            'course_id',
            'student_id'
        );
    }

    
    public function professors(): BelongsToMany
    {
        return $this->belongsToMany(
            Professor::class,
            'course_professor', 
            'course_id',
            'professor_id'
        );
    }

}
