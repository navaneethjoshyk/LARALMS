<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'department',
    ];

    public function courses()
        {
            return $this->belongsToMany(
                Course::class,
                'course_professor', 
                'professor_id',
                'course_id'
            );
        }


    public function getFullNameAttribute(): string
    {
        return $this->fname . ' ' . $this->lname;
    }
}
