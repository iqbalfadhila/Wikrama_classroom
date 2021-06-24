<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $guarded = [];

    public function rayon()
    {
        return $this->hasOne('App\Rayon');
    }
}
