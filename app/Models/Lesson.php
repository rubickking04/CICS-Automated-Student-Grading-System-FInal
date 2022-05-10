<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'teacher_id',
        'subject_id',
        'uuid',
        'subject',
        'room',
        'yearLevel',
        'section',
        'description',
    ];
    protected $dates = [
        'deleted_at',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function subject()
    {
        return $this->hasMany(Subject::class, 'subject_id');
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function grades()
    {
        return $this->hasOne(Grade::class, 'lesson_id');
    }

}
