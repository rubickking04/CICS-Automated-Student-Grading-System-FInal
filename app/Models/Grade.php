<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'user_id',
        'lesson_id',
        'teacher_id',
        'midterm',
        'finalterm',
        'exam',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function lesson()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
