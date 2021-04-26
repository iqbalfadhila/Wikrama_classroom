<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    protected $fillable = [
        'majors'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
