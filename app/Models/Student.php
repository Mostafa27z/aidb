<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'parent_id',
        'grade_level',
    ];
public function clubMembers()
{
    return $this->hasMany(ClubMember::class, 'student_id', 'id');
}

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }
public function submissions()
{
    return $this->hasMany(StudentSubmission::class, 'student_id');
}

    public function lessonsProgress()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_progress')
            ->withPivot('completed_at', 'status', 'score')
            ->withTimestamps();
    }

    public function enrollments()
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'student_id', 'id');
}


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
