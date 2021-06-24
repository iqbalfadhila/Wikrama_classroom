<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = [
        'rombel', 'majors_id'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function task()
    {
        return $this->hasOne('App\Task');
    }

    public function majors()
    {
        return $this->belongsTo('App\Majors');
    }
}
