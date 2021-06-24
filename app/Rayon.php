<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = [
        'rayon', 'supervisor_id'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
}
