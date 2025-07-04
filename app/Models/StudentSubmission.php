<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'assignment_id',
        'file_path',
        'submission_text',
    ];

    // Relationships
//     public function student() {
//         return $this->belongsTo(Student::class);
//     }

//     public function assignment() {
//         return $this->belongsTo(Assignment::class);
//     }
//   public function reviews()
// {
//     return $this->hasMany(TeacherAssignmentReview::class, 'submission_id');
// }

public function assignment()
{
    return $this->belongsTo(Assignment::class, 'assignment_id');
}

public function student()
{
    return $this->belongsTo(Student::class, 'student_id');
}

public function reviews()
{
    return $this->hasMany(TeacherAssignmentReview::class, 'submission_id');
}


}
