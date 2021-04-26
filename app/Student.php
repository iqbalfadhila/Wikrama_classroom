<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'name',
        'user_id',
        'rombel_id',
        'majors_id',
        'rayon_id',
        'grade',
        'religion',
        'gender',
        'photo',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'pemilik_id');
    }

    public function rombel()
    {
        return $this->belongsTo('App\Rombel');
    }

    public function majors()
    {
        return $this->belongsTo('App\majors');
    }

    public function rayon()
    {
        return $this->belongsTo('App\rayon', 'rayon_id');
    }
}
