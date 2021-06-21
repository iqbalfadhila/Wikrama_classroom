<?php

use App\Rombel;
use App\Student;
use Illuminate\Support\Facades\Auth;

function getAuthRombel()
{
    return Student::select('id', 'user_id', 'rombel_id')->where('user_id', Auth::user()->id)
        ->with('rombel')->get();
}