<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'lesson'
    ];

    public function teacher()
    {
        return $this->hasMany('App\teacher');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($teacher) { // before delete() method call this
             $teacher->teacher()->delete();
             // do the rest of the cleanup...
        });
    }
}
