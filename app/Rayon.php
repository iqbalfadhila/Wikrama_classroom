<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = [
        'rayon'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
