<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'lesson'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
