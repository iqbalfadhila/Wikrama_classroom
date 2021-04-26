<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }
}
