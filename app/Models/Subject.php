<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject',
        'room',
        'section',
        'description',
        'yearLevel',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function boot ()
    {
        // Boot other traits on the Model
        parent::boot();
        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class, 'subject_id');
    }
    public function grade(){
        return $this->hasMany(Grade::class, 'subject_id');
    }
}
