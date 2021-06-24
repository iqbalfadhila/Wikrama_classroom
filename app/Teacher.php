<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'user_id',
        'lesson_id',
        'religion',
        'gender',
        'photo',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'pemilik_id');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function task()
    {
        return $this->hasOne('App\Task');
    }
    public function collect()
    {
        return $this->hasOne('App\collect');
    }
}
