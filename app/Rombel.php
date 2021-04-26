<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = [
        'rombel'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
