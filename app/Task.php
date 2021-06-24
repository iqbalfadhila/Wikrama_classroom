<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'teacher_id',
        'rombel_id',
        'lesson_id',
        'upload',
        'deadline',
        'description',
        'file'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function rombel()
    {
        return $this->belongsTo('App\Rombel');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
}
